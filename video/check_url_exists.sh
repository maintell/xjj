#!/bin/bash
#cat /dev/null >a.txt
cat $1 | while read line
do
  status=$(curl -s --head $line | head -n 1 |grep 'HTTP/1.[01] [23]..')
  if [ -n "$status" ]; then
    echo $line>>a.txt
  else
    echo "不存在：${line##*.net}" 
    newline=$(grep ${line##*.net} $1.bak)
    echo $newline>>a.txt
  fi
done