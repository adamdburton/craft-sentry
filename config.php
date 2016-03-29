<?php

return array(
    'sentryDsn' => !empty($_ENV['SENTRY_DSN']) ? $_ENV['SENTRY_DSN'] : '',
    'sentryPublicDsn' => !empty($_ENV['SENTRY_PUBLIC_DSN']) ? $_ENV['SENTRY_PUBLIC_DSN'] : '',
);
