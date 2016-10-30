#!/bin/bash

INPUT_FILE=$1
SRC_CODE=$2 
USR_EXE=$3

	cat "./input/$INPUT_FILE" | "./tmp/$USR_EXE" > "./tmp/$SRC_CODE.output"

if [ "$?" == "139" ]
then
	echo "RE" > "./tmp/$SRC_CODE.status"
else
	echo "SR" > "./tmp/$SRC_CODE.status"
fi

