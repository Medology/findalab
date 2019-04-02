#!/usr/bin/env bash

hashDir() {
    cd $1 && git add . && git ls-files -s | git hash-object --stdin | tail -c 8 && git reset --quiet .;
}
