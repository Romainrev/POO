<?php

# Chargement du Bootstrap
require_once 'bootstrap.php';

# Chargement du header
include_once PATH_HEADER;

# Contenu de mon site
include_once PATH_ROOT . '/Core/Core.php';
$core = new Core($_GET);

# Chargement du Footer
include_once PATH_FOOTER;