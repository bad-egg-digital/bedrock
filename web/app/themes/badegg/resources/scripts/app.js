import domReady from '@roots/sage/client/dom-ready';
import Header from '../views/sections/header/header';
import Footer from '../views/sections/footer/footer';
import blocks from './blocks.js';
import LazyLoad from './lib/Lazy.js';
import Accordion from './lib/Accordion.js';

/**
 * Application entrypoint
 */
domReady(async () => {
  LazyLoad();
  Accordion();
  Header();
  Footer();
  blocks();
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
