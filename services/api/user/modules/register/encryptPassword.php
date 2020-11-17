<?php

function passencrypt($pass) {
  return password_hash($pass, PASSWORD_DEFAULT);
}
