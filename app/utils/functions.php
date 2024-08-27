<?php

function isDev(){
  return $_ENV['APP_ENV'] === 'local';
}