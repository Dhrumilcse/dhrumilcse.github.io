<?php

return [
    // 'url' => 'https://dhrumil.ca',
    'panel' => [
      'install' => true,
      'slug' => 'panel'
    ],
    'd4l' => [
      'static_site_generator' => [
        'endpoint' => 'generate-static-site', # set to any string like 'generate-static-site' to use the built-in endpoint (necessary when using the blueprint field)
        'output_folder' => './static', # you can specify an absolute or relative path
        'preserve' => [], # preserve individual files / folders in the root level of the output folder (anything starting with "." is always preserved)
        'skip_media' => false, # set to true to skip copying media files, e.g. when they are already on a CDN; combinable with 'preserve' => ['media']
        'skip_templates' => [] # ignore pages with given templates (home is always rendered)
      ],
    ],
];
