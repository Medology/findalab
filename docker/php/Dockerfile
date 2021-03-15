# medology/findalab-php
FROM chekote/php:8.0.3

RUN apt-get update && \
    # findalab dependencies
    apt-get install -y php7.0-curl && \

    # Cleanup
    apt-get remove -y && \
    apt-get autoremove -y && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*
