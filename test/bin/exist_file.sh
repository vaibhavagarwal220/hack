#!/bin/bash

FILE=$1
STATUS="./tmp/file.status"

if [ -a "$FILE" ]
then
	echo "FE" > $STATUS
else
	echo "FDNE" > $STATUS
fi