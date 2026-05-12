<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'Investigación Educativa en la Era Digital',
                'authors' => 'María Fernández, Carlos Ruiz',
                'partner' => 'María Fernández, Carlos Ruiz',
                'description' => 'Una obra que explora el impacto de las tecnologías digitales en las metodologías de investigación educativa contemporánea.',
                'cover' => 'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&q=80&w=640',
            ],
            [
                'title' => 'Historia Crítica de América Latina',
                'authors' => 'Eduardo Galeano, Josefina Morales',
                'partner' => 'Eduardo Galeano, Josefina Morales',
                'description' => 'Análisis exhaustivo de los procesos históricos y políticos que han moldeado la realidad de los países latinoamericanos.',
                'cover' => 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&q=80&w=640',
            ],
            [
                'title' => 'Fundamentos de Economía Sustentable',
                'authors' => 'Arturo Hernández',
                'partner' => 'Arturo Hernández',
                'description' => 'Este libro presenta un enfoque innovador sobre cómo transitar hacia modelos económicos que respeten los límites del planeta.',
                'cover' => 'https://images.unsplash.com/photo-1532012197267-da84d127e765?auto=format&fit=crop&q=80&w=640',
            ],
            [
                'title' => 'Sociología del Trabajo Contemporáneo',
                'authors' => 'Ana Lucía Silva',
                'partner' => 'Ana Lucía Silva',
                'description' => 'Un estudio sobre las nuevas formas de empleo, el trabajo remoto y sus implicaciones sociales en el siglo XXI.',
                'cover' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&q=80&w=640',
            ],
            [
                'title' => 'Filosofía de la Ciencia y Modelos de Pensamiento',
                'authors' => 'Roberto Gómez',
                'partner' => 'Roberto Gómez',
                'description' => 'Obra fundamental para entender cómo se construye el conocimiento científico y los distintos paradigmas del pensamiento.',
                'cover' => 'https://images.unsplash.com/photo-1542831371-29b0f74f9713?auto=format&fit=crop&q=80&w=640',
            ],
            [
                'title' => 'Antología de Poesía Moderna',
                'authors' => 'Varios Autores',
                'partner' => 'Varios Autores',
                'description' => 'Una selección cuidadosa de los poemas más representativos de la literatura moderna iberoamericana.',
                'cover' => 'https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&q=80&w=640',
            ],
            [
                'title' => 'Psicología Clínica y Terapias Breves',
                'authors' => 'Laura Martínez',
                'partner' => 'Laura Martínez',
                'description' => 'Manual práctico sobre intervenciones psicológicas de corta duración y alta eficacia enfocadas en la resolución de problemas.',
                'cover' => 'https://images.unsplash.com/photo-1495446815901-a7297e633e8d?auto=format&fit=crop&q=80&w=640',
            ],
            [
                'title' => 'La Ciudad Sostenible del Futuro',
                'authors' => 'Jorge de la Cruz',
                'partner' => 'Jorge de la Cruz',
                'description' => 'Exploración de proyectos urbanísticos que priorizan el bienestar de los ciudadanos y la reducción del impacto ambiental.',
                'cover' => 'https://images.unsplash.com/photo-1449844908441-8829872d2607?auto=format&fit=crop&q=80&w=640',
            ],
            [
                'title' => 'Derechos Humanos en el Siglo XXI',
                'authors' => 'Isabel Valdés',
                'partner' => 'Isabel Valdés',
                'description' => 'Un análisis riguroso de los nuevos retos que enfrentan los derechos fundamentales ante los avances tecnológicos y las crisis globales.',
                'cover' => 'https://images.unsplash.com/photo-1453928582365-b6ad33cbcf64?auto=format&fit=crop&q=80&w=640',
            ],
            [
                'title' => 'Inteligencia Artificial y Educación',
                'authors' => 'David Ortiz, Sara Jiménez',
                'partner' => 'David Ortiz, Sara Jiménez',
                'description' => 'Reflexiones sobre cómo la IA está transformando el aprendizaje, el rol de los docentes y la gestión de la educación.',
                'cover' => 'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?auto=format&fit=crop&q=80&w=640',
            ],
            [
                'title' => 'Cálculo Diferencial Avanzado',
                'authors' => 'Pedro Sánchez',
                'partner' => 'Pedro Sánchez',
                'description' => 'Un enfoque moderno y riguroso sobre el cálculo diferencial, diseñado para estudiantes de ingeniería y ciencias exactas.',
                'cover' => 'https://images.unsplash.com/photo-1509228468518-180dd4864904?auto=format&fit=crop&q=80&w=640'
            ],
            [
                'title' => 'Marketing Digital y Redes Sociales',
                'authors' => 'Laura Gómez',
                'partner' => 'Laura Gómez',
                'description' => 'Estrategias innovadoras para posicionamiento de marca en la era del consumidor hiperconectado y las plataformas sociales.',
                'cover' => 'https://images.unsplash.com/photo-1432888498266-38ffec3eaf0a?auto=format&fit=crop&q=80&w=640'
            ],
            [
                'title' => 'Introducción a la programación con Python',
                'authors' => 'Javier López',
                'partner' => 'Javier López',
                'description' => 'Guía completa y estructurada para aprender los fundamentos lógicos y desarrollar aplicaciones prácticas con Python.',
                'cover' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&q=80&w=640'
            ],
            [
                'title' => 'Arquitectura Sostenible',
                'authors' => 'Camila Rivas',
                'partner' => 'Camila Rivas',
                'description' => 'El impacto del diseño ecológico y la utilización de materiales renovables en las construcciones del mañana.',
                'cover' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=640'
            ],
            [
                'title' => 'Ética en el Ejercicio Médico',
                'authors' => 'Manuel Fuentes',
                'partner' => 'Manuel Fuentes',
                'description' => 'Una revisión de los dilemas éticos que enfrentan los profesionales de la salud en el mundo actual.',
                'cover' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&q=80&w=640'
            ],
            [
                'title' => 'Neurociencia del Aprendizaje',
                'authors' => 'Elena Martínez',
                'partner' => 'Elena Martínez',
                'description' => 'Estudios recientes sobre cómo funciona el cerebro humano cuando adquiere, procesa y retiene nueva información.',
                'cover' => 'https://images.unsplash.com/photo-1559757175-5700dde675bc?auto=format&fit=crop&q=80&w=640'
            ],
            [
                'title' => 'Derecho Penal Internacional',
                'authors' => 'Ricardo Torres',
                'partner' => 'Ricardo Torres',
                'description' => 'Tratado completo sobre los tribunales internacionales, crímenes de lesa humanidad y jurisprudencia comparada.',
                'cover' => 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&q=80&w=640'
            ],
            [
                'title' => 'Diseño Gráfico y Percepción Visual',
                'authors' => 'Valeria Conde',
                'partner' => 'Valeria Conde',
                'description' => 'Cómo la psicología y el diseño interactúan para captar la atención y comunicar mensajes efectivos visualmente.',
                'cover' => 'https://images.unsplash.com/photo-1626785774573-4b799315345d?auto=format&fit=crop&q=80&w=640'
            ],
            [
                'title' => 'Energías Renovables',
                'authors' => 'Gustavo Alarcón',
                'partner' => 'Gustavo Alarcón',
                'description' => 'Perspectivas sobre la transición energética, paneles solares, energía eólica y su viabilidad económica a largo plazo.',
                'cover' => 'https://images.unsplash.com/photo-1466611653911-95081537e5b7?auto=format&fit=crop&q=80&w=640'
            ],
            [
                'title' => 'Finanzas Corporativas Avanzadas',
                'authors' => 'Patricia Vargas',
                'partner' => 'Patricia Vargas',
                'description' => 'Métodos de valoración de empresas, fusiones, adquisiciones y análisis de riesgo en los mercados bursátiles.',
                'cover' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=640'
            ],
            [
                'title' => 'Gestión de Proyectos Ágiles',
                'authors' => 'Fernando Pineda',
                'partner' => 'Fernando Pineda',
                'description' => 'Implementando metodologías Scrum y Kanban en equipos de desarrollo tecnológico y más allá.',
                'cover' => 'https://images.unsplash.com/photo-1531403009284-440f080d1e12?auto=format&fit=crop&q=80&w=640'
            ],
            [
                'title' => 'Cultura y Liderazgo Empresarial',
                'authors' => 'Silvia Ortega',
                'partner' => 'Silvia Ortega',
                'description' => 'La importancia de construir un ambiente laboral que fomente el crecimiento, la innovación y el trabajo en equipo.',
                'cover' => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&q=80&w=640'
            ],
            [
                'title' => 'Microbiología Clínica',
                'authors' => 'Daniela Rojas',
                'partner' => 'Daniela Rojas',
                'description' => 'Manual de diagnóstico integral de bacterias, virus, hongos y parásitos patógenos para el ser humano.',
                'cover' => 'https://images.unsplash.com/photo-1579154204601-01588f351e67?auto=format&fit=crop&q=80&w=640'
            ],
            [
                'title' => 'Robótica e Ingeniería Mecatrónica',
                'authors' => 'Alejandro Domínguez',
                'partner' => 'Alejandro Domínguez',
                'description' => 'Aplicaciones prácticas y principios básicos en la construcción de sistemas autónomos y el control de robots industriales.',
                'cover' => 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?auto=format&fit=crop&q=80&w=640'
            ],
            [
                'title' => 'Historia del Arte Contemporáneo',
                'authors' => 'Beatriz Ríos',
                'partner' => 'Beatriz Ríos',
                'description' => 'Evolución de las principales corrientes artísticas del siglo XX y XXI, desde el cubismo hasta el arte conceptual.',
                'cover' => 'https://images.unsplash.com/photo-1513364776144-60967b0f800f?auto=format&fit=crop&q=80&w=640'
            ],
            [
                'title' => 'Desarrollo de Software Seguro',
                'authors' => 'Héctor Cárdenas',
                'partner' => 'Héctor Cárdenas',
                'description' => 'Prevención de vulnerabilidades y buenas prácticas para la creación de aplicaciones resilientes ante ataques cibernéticos.',
                'cover' => 'https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?auto=format&fit=crop&q=80&w=640'
            ],
            [
                'title' => 'Comportamiento del Consumidor',
                'authors' => 'Natalia Lozano',
                'partner' => 'Natalia Lozano',
                'description' => 'Análisis profundo sobre los factores psicológicos y sociales que dictan las decisiones de compra en el mercado actual.',
                'cover' => 'https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?auto=format&fit=crop&q=80&w=640'
            ],
            [
                'title' => 'Nutrición y Dietética Aplicada',
                'authors' => 'Carmen Bernal',
                'partner' => 'Carmen Bernal',
                'description' => 'Bases científicas para elaborar planes de alimentación balanceados según las necesidades fisiológicas de cada individuo.',
                'cover' => 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?auto=format&fit=crop&q=80&w=640'
            ],
            [
                'title' => 'Bases de Datos Relacionales',
                'authors' => 'Rubén Montes',
                'partner' => 'Rubén Montes',
                'description' => 'Modelado, normalización y optimización de bases de datos utilizando los lenguajes SQL más populares del mercado.',
                'cover' => 'https://images.unsplash.com/photo-1544383835-bda2bc66a55d?auto=format&fit=crop&q=80&w=640'
            ],
            [
                'title' => 'Políticas Públicas y Bienestar Social',
                'authors' => 'Sofía Villarreal',
                'partner' => 'Sofía Villarreal',
                'description' => 'Una crítica a los programas sociales implementados en la última década y su verdadero impacto en la reducción de la pobreza.',
                'cover' => 'https://images.unsplash.com/photo-1529107386315-e1a2ed48a620?auto=format&fit=crop&q=80&w=640'
            ]
        ];

        foreach ($books as $bookData) {
            Book::factory()->create($bookData);
        }
    }
}
