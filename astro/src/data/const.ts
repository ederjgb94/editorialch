
export const SITE = {
  title: "SCASED",
  description: "lorem ipsum dolor sit amet consectetur adipisicing elit",
  author: "Mohammad Rahmani",
  url: "https://astro-news-six.vercel.app",
  github: "https://github.com/Mrahmani71/astro-news",
  locale: "en-US",
  dir: "ltr",
  charset: "UTF-8",
  basePath: "/",
  postsPerPage: 4,
};

export type Link = {
  href: string;
  text: string;
  icon?: string;
  target?: "_blank" | "_self";
};


export const NAVBAR_LINKS: Link[] = [
  {
    href: "/",
    text: "Home",
  },
  {
    href: "/libros",
    text: "Libros",
  },
  {
    href: "/contacto",
    text: "Contacto",
  },
]
