<?php


HTML::macro('left_sidebar', function()
{
	
    $StringBuilder = array();
    $menus = Config::get('config_sidebar.menus');
    $Menue = array_keys($menus);
    $StringBuilder[] = '<ul class="sidebar-menu"><li class="header">Chan</li>';

    for($i = 0; $i < sizeof($menus); $i++)
    {
        $StringBuilder[] = sprintf('<li class="treeview"><a href="#"><i class="fa fa-link"></i> <span>%s</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a><ul class="treeview-menu">', $Menue[$i]);

        for($j = 0; $j < sizeof(array_values($menus)[$i]); $j++)
        {
          $infos = explode("->",array_values($menus)[$i][$j]);

        	$StringBuilder[] = sprintf('<li><a href="%s">%s</a></li>',$infos[1], $infos[0]);

        }
        
        $StringBuilder[] = '</ul></li>';
          
    }
    $StringBuilder[] = '</ul>';
    return join("\n", $StringBuilder);
});

HTML::macro('left_sidebar_userpanel', function($fullname){
	$StringBuilder = sprintf('<div class="user-panel">
        <div class="pull-left info">
          <p>%s</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>',$fullname);
      return $StringBuilder;
});


//id title content deadline state
HTML::macro('display_tasks', function($modify = 999){
  $tasks = Task::all();
  echo '<table class="table">';
  echo '<tr>
            <td><b>ID</b></td>
            <td><b>TITRE</b></td>
            <td><b>CONTENU</b></td>
            <td><b>DATELIMITE</b></td>
        </tr>';

  for($i=0; $i < sizeof($tasks); $i++ ){
    if($tasks[$i]->id != $modify)
    {
      echo '<tr>
            <td>'.$tasks[$i]->id.'</td>'.
            '<td>'.$tasks[$i]->title.'</td>'.
            '<td>'.$tasks[$i]->content.'</td>'.
            '<td>'.$tasks[$i]->deadline.'</td>'.
            '<td>'.$tasks[$i]->state.'</td>';
      echo Form::open();
      echo Form::input('hidden', 'id', $tasks[$i]->id);
      echo '<td>'.Form::input('submit', 'action', 'Modifier').'</td>';
      echo '<td>'.Form::input('submit', 'action', 'Supprimer').'</td>';

      echo Form::close().'</tr>';
    }
    else{
      echo '<tr>'.Form::open();
      echo '<td>'.Form::input('textarea', 'id', $tasks[$i]->id, array('readonly')).'</td>';
      echo '<td>'.Form::input('textarea', 'title', $tasks[$i]->title).'</td>';
      echo '<td>'.Form::input('textarea', 'content', $tasks[$i]->content).'</td>';
      echo '<td>'.Form::input('date', 'deadline', $tasks[$i]->deadline).'</td>';
      //echo '<td>'.Form::input('textarea', 'state', $tasks[$i]->state).'</td>';
      echo '<td>'.Form::input('submit', 'action', 'Sauvegarder').'</td>';
      echo '<td>'.Form::input('submit', 'action', 'Supprimer').'</td>';

      echo Form::close().'</tr>';
    }
    
  }
  echo '</table>';
});

HTML::macro('add_task', function(){
  echo Form::open().
Form::label("label_titre", "Titre").'<br>'.
Form::text("title") .'<br><br>'.
Form::label("label_contenu", "Contenu").'<br>'.
Form::text("content") .'<br><br>'.

Form::label("label_datelimite", "DateLimite").'<br>'.
Form::input('date', 'deadline').'<br><br>'.

Form::input('submit', 'action', 'Créer').
Form::close();
});

?>
