"use strict";

// ! En faisant la méthode modules je vais devoir importer mes fichiers JS dans le fichier script.js
// ! Ce qui me permettra de ne pas avoir de code dupliqué sur mes pages HTML, ça me simplifie les choses car je n'ai plus qu'un seul fichier JS à gérer 
// ! Sur chaque page HTML je vais juste devoir importer le fichier script.js et il va tout gérer

import {createlist} from "./prefix.js";
import {startMenuBurger} from "./Menu-Burger.js";  // Le menu burger se trouve dans le fichier header.html avec le fetch et les modales
// Donc avec Menu-Burger On va pouvoir retrouver le header,les modales et le menu burger
import { ValidationDesChamps,MDPvisible } from "./login.js";

