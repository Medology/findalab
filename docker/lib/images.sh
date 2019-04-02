#!/usr/bin/env bash

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/../../" && pwd)"

. "${ROOT}/docker/lib/hash.sh"

export NODE_OWNER=medology
export NODE_REPO=findalab-node
export NODE_TAG=$(hashDir ${ROOT}/docker/node)
export NODE_IMAGE=${NODE_OWNER}/${NODE_REPO}:${NODE_TAG}

export YARN_OWNER=medology
export YARN_REPO=findalab-node
export YARN_TAG=$(hashDir ${ROOT}/docker/node)
export YARN_IMAGE=${YARN_OWNER}/${YARN_REPO}:${YARN_TAG}
