<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AstroController extends Controller
{
    protected $astroServerUrl;
    
    public function __construct()
    {
        // Set the URL to the Astro server - change the port if your Astro server uses a different one
        $this->astroServerUrl = 'http://localhost:4321';
    }
    
    public function handle(Request $request, $path = '')
    {
        // Check if Astro server is running
        try {
            $response = Http::timeout(2)->head($this->astroServerUrl);
            
            if ($response->successful()) {
                return $this->proxyToAstro($request, $path);
            }
        } catch (\Exception $e) {
            Log::warning("Astro server is not running: " . $e->getMessage());
            // If Astro server is not running, try to start it
            $this->startAstroServer();
            return $this->fallbackResponse();
        }
        
        return $this->fallbackResponse();
    }
    
    protected function proxyToAstro(Request $request, $path)
    {
        $targetUrl = $this->astroServerUrl . '/' . $path;
        $targetUrl = rtrim($targetUrl, '/');
        if (empty($path)) {
            $targetUrl .= '/';
        }
        
        $method = strtolower($request->method());
        
        try {
            $response = Http::withHeaders($this->getForwardHeaders($request))
                ->$method($targetUrl, $request->all());
                
            return response($response->body(), $response->status())
                ->withHeaders($this->filterResponseHeaders($response->headers()));
        } catch (\Exception $e) {
            Log::error("Error proxying to Astro: " . $e->getMessage());
            return $this->fallbackResponse();
        }
    }
    
    protected function getForwardHeaders(Request $request)
    {
        $headers = [];
        foreach ($request->headers as $key => $value) {
            if (!in_array(strtolower($key), ['host', 'connection', 'content-length'])) {
                $headers[$key] = $value[0];
            }
        }
        return $headers;
    }
    
    protected function filterResponseHeaders(array $headers)
    {
        $filteredHeaders = [];
        $excludedHeaders = ['transfer-encoding', 'connection', 'host', 'content-length'];
        
        foreach ($headers as $name => $values) {
            if (!in_array(strtolower($name), $excludedHeaders)) {
                $filteredHeaders[$name] = $values;
            }
        }
        
        return $filteredHeaders;
    }
    
    protected function startAstroServer()
    {
        // This is a simple attempt to start the Astro server
        // In a production environment, you would want a more robust solution
        $serverPath = base_path('public/astro/server/entry.mjs');
        if (file_exists($serverPath)) {
            // Start the server as a background process
            exec('cd ' . base_path() . ' && node public/astro/server/entry.mjs > /dev/null 2>&1 &');
            // Give it a moment to start
            sleep(2);
        }
    }
    
    protected function fallbackResponse()
    {
        return response()->view('astro_fallback', [], 503);
    }
}
