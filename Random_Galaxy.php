<html><head></head><body style='font-family: Arial; font-size: 11px'>

<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

/* Legend

0 = empty
5 = Sun
3 = Planet
4 = Asteroid
9 = Player
1 = Habitat Zone
8 = Black Hole

*/

echo "5 = Sun
<br>3 = Planet
<br>4 = Asteroid
<br>9 = Player
<br>1 = Habitat (Life) Zone
<br>8 = Black Hole";

// Array Test //

$size = 40;

$suns = rand(5,8);
$planets = rand(8,32);
$asteroids = rand(64,128);

$arr[$size][$size];

echo "<br><br />Sonnen: ".$suns;
echo "<br />Planeten: ".$planets;
echo "<br />Asteroiden: ".$asteroids;

// Fill Array //

for ($i = 0; $i < $size; $i++ )
{
      for ($j = 0; $j < $size; $j++ )
      {
        $arr[$i][$j] = 0;     
      }  
}

// Sun Placement //

for ($c = 0; $c < $suns; $c++)
{
      $x = rand(4,35);
      $y = rand(4,35);
      
      $placeS = 0;
     
      // Check for free space 
      for ($cc = -1; $cc <= 1; $cc++)
      {
          for ($ccc = -1; $ccc <= 1; $ccc++)
          {
              if ($arr[$x+$ccc][$y+$cc] == 5)
              {
                  $placeS = 1;
              }          
          }       
      }      
      
      if ($placeS != 1 and $arr[$x][$y] != 1)
      {
            
        $arr[$x][$y] = 5;
        
        // Habitat Zone Size
        $habzone = rand(2,4);
        
        
        // Habitat Zone Placement
        $xx = $x - $habzone;
        $yy = $y - $habzone; 
        
        // LEFT
        for ($cc = 0; $cc <= ($habzone*2); $cc++)
        {
             if ($arr[$xx][$yy] != 5)
             {
                $arr[$xx][$yy] = 1;
             }
             $xx++;
        }
        
        // Habitat Zone Placement
        $xx = $x - $habzone;
        $yy = $y + $habzone; 
        
        // Right
        for ($cc = 0; $cc <= ($habzone*2); $cc++)
        {
             if ($arr[$xx][$yy] != 5)
             {
                $arr[$xx][$yy] = 1;
             }
             $xx++;
        }
        
        // Habitat Zone Placement
        $xx = $x - $habzone;
        $yy = $y - $habzone; 
        
        // Top
        for ($cc = 0; $cc <= ($habzone*2); $cc++)
        {
             if ($arr[$xx][$yy] != 5)
             {
                $arr[$xx][$yy] = 1;
             }
             $yy++;
        }
        
                // Habitat Zone Placement
        $xx = $x + $habzone;
        $yy = $y - $habzone; 
        
        // Bottom
        for ($cc = 0; $cc <= ($habzone*2); $cc++)
        {
             if ($arr[$xx][$yy] != 5)
             {
                $arr[$xx][$yy] = 1;
             }
             $yy++;
        }
        
        // Save Sun Position and Habzone
        
        
        $sunX[$c] = $x;
        $sunY[$c] = $y;
        $sunZ[$c] = $habzone;              
      }
      else
      {
        $c--;
      }
}

// Delete Overlaying Habzones

for ($c = 0; $c < $suns; $c++)
{
     $x = $sunX[$c];
     $y = $sunY[$c];
     $z = $sunZ[$c];
     
      // Check for free space 
      for ($cc = -($z-1); $cc < $z; $cc++)
      {
          for ($ccc = -($z-1); $ccc < $z; $ccc++)
          {
              if ($arr[$x+($ccc)][$y+($cc)] == 1)
              {
                  $arr[$x+($ccc)][$y+($cc)] = 0;
              }          
          }       
      }      
}


// Planet Placement //

for ($c = 0; $c < $planets; $c++)
{
      $a = rand(0,39);
      $b = rand(0,39);
      
      $placeP = 0;
      
      for ($cc = -1; $cc <= 1; $cc++)
      {
          for ($ccc = -1; $ccc <= 1; $ccc++)
          {
              if ($arr[$a+$ccc][$b+$cc] == 5 or $arr[$a+$ccc][$b+$cc] == 3)
              {
                  $placeP = 1;
              }          
          }       
      }
      
      if ($placeP != 1 and $arr[$a][$b] != 3)
      {
        $arr[$a][$b] = 3;
      }
      else
      {
        $c--;
      }
}

// Asteroid Placement //

for ($c = 0; $c < $asteroids; $c++)
{
      $aa = rand(0,39);
      $bb = rand(0,39);
      if ($arr[$aa][$bb] != 5 and $arr[$aa][$bb] != 3 and $arr[$aa][$bb] != 4 )
      {
        $arr[$aa][$bb] = 4;
      }
      else
      {
        $c--;
      }
}

// Player Placement //

do
{
  $aaa = rand(1,38);
  $bbb = rand(1,38);
            
}while ($arr[$aaa][$bbb] == 5   or $arr[$aaa][$bbb] == 3     or $arr[$aaa][$bbb] == 4 or 
      $arr[$aaa+1][$bbb] == 5   or $arr[$aaa+1][$bbb] == 3   or $arr[$aaa+1][$bbb] == 4 or
      $arr[$aaa+1][$bbb+1] == 5 or $arr[$aaa+1][$bbb+1] == 3 or $arr[$aaa+1][$bbb+1] == 4 or
      $arr[$aaa][$bbb+1] == 5   or $arr[$aaa][$bbb+1] == 3   or $arr[$aaa][$bbb+1] == 4 or
      $arr[$aaa-1][$bbb] == 5   or $arr[$aaa-1][$bbb] == 3   or $arr[$aaa-1][$bbb] == 4 or
      $arr[$aaa-1][$bbb-1] == 5 or $arr[$aaa-1][$bbb-1] == 3 or $arr[$aaa-1][$bbb-1] == 4 or
      $arr[$aaa][$bbb-1] == 5   or $arr[$aaa][$bbb-1] == 3   or $arr[$aaa][$bbb-1] == 4 or
      $arr[$aaa+1][$bbb-1] == 5 or $arr[$aaa+1][$bbb-1] == 3 or $arr[$aaa+1][$bbb-1] == 4 or
      $arr[$aaa-1][$bbb+1] == 5 or $arr[$aaa-1][$bbb+1] == 3 or $arr[$aaa-1][$bbb+1] == 4); 

$arr[$aaa][$bbb] = 9;


// Black Hole Placement

for ($c = 0; $c < 4; $c++)
{
  $BHX = rand(1,38);
  $BHY = rand(1,38);
  
  $placeB = 0;
     
  // Check for free space 
  for ($cc = -2; $cc <= 2; $cc++)
  {
      for ($ccc = -2; $ccc <= 2; $ccc++)
      {
          if ($arr[$BHX+($ccc)][$BHY+($cc)] == 1 or 
              $arr[$BHX+($ccc)][$BHY+($cc)] == 3 or
              $arr[$BHX+($ccc)][$BHY+($cc)] == 5 or
              $arr[$BHX+($ccc)][$BHY+($cc)] == 8 or
              $arr[$BHX+($ccc)][$BHY+($cc)] == 9 or
              $arr[$BHX+($ccc)][$BHY+($cc)] == 4 )
          {
              $placeB = 1;
          }          
      }       
  }
  
  if ($placeB != 1)
  {
      $arr[$BHX][$BHY] = 8;
  }
  else
  {
      $c--;
  }
  
        
}



echo "<br /><br />";


// Display everything //

for ($i = 0; $i < $size; $i++ )
{
  for ($j = 0; $j < $size; $j++ )
  {  
    if ($arr[$i][$j] == 1)
    {
      echo "<strong><span style='color: #00cc00'>1</span></strong>&nbsp&nbsp";
    }
    elseif ($arr[$i][$j] == 5)
    {
      echo "<strong><span style='color: #ff9900'>5</span></strong>&nbsp&nbsp";
    }
    elseif ($arr[$i][$j] == 3)
    {
      echo "<strong><span style='color: #3366ff'>3</span></strong>&nbsp&nbsp";
    }
    elseif ($arr[$i][$j] == 4)
    {
      echo "<strong><span style='color: #999999'>4</span></strong>&nbsp&nbsp";
    }
    elseif ($arr[$i][$j] == 9)
    {
      echo "<strong><span style='color: #ff0000'>9</span></strong>&nbsp&nbsp";
    }
    elseif ($arr[$i][$j] == 8)
    {
      echo "<strong><span style='color: #000000'>8</span></strong>&nbsp&nbsp";
    }
    else
    {
      echo "<span style='color: #dddddd'>0</span>&nbsp&nbsp";
    }     
  }
  echo "<br />";  
}

?>
</body></html>