#!/bin/bash

CC="$1"

SRC="$2"

LOCATION="codes/"

	 $CC $LOCATION$SRC -o tmp/$SRC.out &> tmp/$SRC.err

ERROR=$(wc -l tmp/$SRC.err | awk '{print$1;}')

echo "$ERROR" > "tmp/$SRC.status"