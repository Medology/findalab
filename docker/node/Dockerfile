FROM registry.hub.docker.com/chekote/node:11.4.0

RUN apt-get update && \
    #
    # node-sass requirements
    apt-get install -y --no-install-recommends --no-install-suggests \
        g++ \
        make \
        python \
        && \
    #
    # Cleanup
    apt-get remove -y && \
    apt-get autoremove -y && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*
