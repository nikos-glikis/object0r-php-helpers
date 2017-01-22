#!/usr/bin/env bash
XDEBUG_CONFIG="remote_enable=1"  phpunit --coverage-text=tmp/logs/coverage.txt --coverage-xml=tmp/logs/coverage.xml  --coverage-html=tmp/logs/coverage_html/  src