#!/usr/bin/env bash

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/../../" && pwd)"

export DOCKER_HUB_HOST=registry.hub.docker.com
export COMMON_REPO_ACCOUNT=chekote

export NODE_REPO=node
export NODE_TAG=11.4.0
export NODE_IMAGE=${DOCKER_HUB_HOST}/${COMMON_REPO_ACCOUNT}/${NODE_REPO}:${NODE_TAG}

export YARN_REPO=node
export YARN_TAG=11.4.0
export YARN_IMAGE=${DOCKER_HUB_HOST}/${COMMON_REPO_ACCOUNT}/${YARN_REPO}:${YARN_TAG}

export SELENIUM_ACCOUNT=selenium
export SELENIUM_REPO=standalone-chrome-debug
export SELENIUM_TAG=3.14.0-dubnium
export SELENIUM_IMAGE=${DOCKER_HUB_HOST}/${SELENIUM_ACCOUNT}/${SELENIUM_REPO}:${SELENIUM_TAG}

export PHP_REPO=php
export PHP_TAG=7.0.33.c-laravel5.2
export PHP_IMAGE=${DOCKER_HUB_HOST}/${COMMON_REPO_ACCOUNT}/${PHP_REPO}:${PHP_TAG}

export SED_REPO=alpine
export SED_TAG=3.8
