#!/bin/bash
#cat /dev/null >a.txt
cat $1 | while read line
do
  type=$(curl -s --head $line |grep 'video/mp4')
  if [ -n "$type" ]; then
    echo $line>>a.txt
  else
    echo "不存在：${line##*.net}" 
    newline=$(grep ${line##*.net} $1.bak)
    if [ -n "$newline" ]; then
      echo $newline>>a.txt
    else
      echo $line>>NOTFOUND.txt
    fi
  fi
done