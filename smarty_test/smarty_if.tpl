<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{$title}</title>
</head>
<body>
  <h1>{$title}</h1>

  {if $if1 == 1}
    <p>1 if </p>
  {else}
    <p>1 else </p>
  {/if}

  {if $if == 1}
    <p>2 1</p>
  {elseif $if == 2}
    <p>2 2</p>
  {elseif $if == 3}
    <p>2 3</p>
  {else}
    <p>2 else</p>
  {/if}

</body>
</html>
