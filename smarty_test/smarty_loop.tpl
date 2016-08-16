<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{$title}</title>
</head>
<body>
  <h1>{$title}</h1>

  <ul>
    {foreach from=$array1 item=value key=key}
      <li>key={$key} value={$value}</li>
    {/foreach}
  </ul>

  <ul>
    {foreach from=$array2 item=value key=key name=loopname}
      <li>no.{$smarty.foreach.loopname.index} key={$key} value={$value}</li>
    {/foreach}
  </ul>

  <ul> 最初の要素と最後の要素
    {foreach from=$array2 item=var name=loop1}
    {if $smarty.foreach.loop1.first}
    <li>first:{$var}</li>
    {elseif $smarty.foreach.loop1.last}
    <li>last:{$var}</li>
    {else}
    <li>:{$var}</li>
    {/if}
    {/foreach}
  </ul>

  <h2>foreach3</h2>
  {if $array2 != NULL}
  <ul>
    {foreach from=$array2 item=var name=loop1}
    <li>{$var}</li>
    {/foreach}
  </ul>
  {else}
    <p>値がありません</p>
  {/if}
  
</body>
</html>
