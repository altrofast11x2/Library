<?php
function script($s)
{
  echo "<script>$s</script>";
}
function alert($a)
{
  script("alert('$a')");
}
function move($a, $m)
{
  alert($a);
  script("location.href='$m';");
}
function back($a)
{
  alert($a);
  script("history.back()");
}
