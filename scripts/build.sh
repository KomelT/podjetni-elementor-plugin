#!/bin/bash

# Extract version number from src/podjetni-elementor.php
version=$(grep -oP 'Version:\s*\K[0-9]+(\.[0-9]+)*' src/podjetni-elementor.php)

# Zip src file
cp -r src podjetni_elementor && zip -rT0 podjetni_elementor-${version}.zip podjetni_elementor && rm -r podjetni_elementor