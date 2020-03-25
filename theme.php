<?php
$toggleTheme = new Func("toggleTheme", function() use (&$localStorage, &$themeMap, &$bodyClass) {
  $current = call_method($localStorage, "getItem", "theme");
  $next = get($themeMap, $current);
  call_method($bodyClass, "replace", $current, $next);
  call_method($localStorage, "setItem", "theme", $next);
});
$themeMap = new Object("dark", "light", "light", "solar", "solar", "dark");
$theme = (is($or_ = call_method($localStorage, "getItem", "theme")) ? $or_ : _seq($tmp = get(call_method($Object, "keys", $themeMap), 0.0), call_method($localStorage, "setItem", "theme", $tmp), $tmp));
$bodyClass = get(get($document, "body"), "classList");
call_method($bodyClass, "add", $theme);
set(call_method($document, "getElementById", "themeButton"), "onclick", $toggleTheme);
