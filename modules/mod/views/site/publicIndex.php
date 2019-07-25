<?php
$this->title = 'Main page';
?>
<div class="container-fluid">
<div class="jumbotron">
<h3>
<?php
            if (!Yii::$app->user->isGuest) {
                echo 'Welcome back ' . Yii::$app->user->identity->username;
            } else {
                echo 'Welcome to this site, dear friend';
            }
            ?>
</h3>
<?php
        if (Yii::$app->user->isGuest) {
            echo 'have an account?';
        }
        ?>
<?php if (Yii::$app->user->isGuest) : ?>
<p><a class="btn btn-primary btn-lg" href="/signin" role="button">Log in</a></p>
<?php endif ?>
</div>
</br>
</div>
<div class="panel panel-info">
<div class="panel-heading">
<div class="container">
<h1>Lorem ipsum</h1>
</div>
<div class="panel-body">
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse congue, diam sit amet suscipit egestas, dui massa molestie nunc, quis convallis enim neque in velit. Aliquam purus quam, finibus sodales sem vel, molestie pharetra magna. Sed enim odio, faucibus et suscipit in, maximus non libero. Vivamus venenatis ultricies ipsum, rhoncus facilisis mauris egestas vel. In eleifend convallis lectus vestibulum ultricies. Integer ornare, velit id ultrices convallis, leo diam facilisis nisl, nec sodales tellus nibh at eros. Phasellus imperdiet lorem ut euismod dapibus. Aenean viverra eleifend congue. Fusce quam lacus, maximus varius varius et, dictum in arcu. Pellentesque mi nulla, aliquet id urna sit amet, pharetra imperdiet elit. In neque enim, efficitur dignissim enim eget, vulputate tincidunt nisi. Sed a hendrerit leo. Sed et magna accumsan est rutrum gravida.
Nullam in euismod erat, in pretium augue. Sed consectetur non turpis eget euismod. Pellentesque cursus tincidunt mi eget efficitur. Nunc non lorem ornare, imperdiet tellus in, efficitur nunc. Mauris ac tellus in ex aliquam consequat. Maecenas nec tincidunt purus. Curabitur hendrerit est a lacinia pretium. Nulla mattis quam ut enim consectetur, at tincidunt orci dictum. Mauris euismod enim sed molestie rutrum. Morbi at consectetur eros. Suspendisse potenti. Ut non magna sit amet ipsum iaculis tincidunt eu sed massa. Nulla facilisi.
Nulla id mi odio. Nunc suscipit pellentesque tortor, in pellentesque mauris tempor quis. Etiam iaculis pretium magna, in ornare nunc. Nunc ornare semper tellus ut mattis. Morbi ultricies nisl lectus. Maecenas laoreet eros odio, ut fermentum erat placerat et. Fusce eget rutrum justo. Nulla egestas tempor leo, eu bibendum elit scelerisque sit amet. Phasellus pulvinar rhoncus magna, et aliquet justo sollicitudin vitae. Vestibulum quis nisi non elit faucibus lacinia quis id justo. Morbi sit amet odio finibus nulla venenatis posuere. Pellentesque luctus hendrerit facilisis. Fusce pharetra a ipsum sed hendrerit. Fusce ac fermentum ex. Integer pharetra luctus velit, at rhoncus neque varius sit amet. Sed ultrices ex ut aliquam feugiat.
Donec in est eu nulla malesuada maximus finibus at velit. Proin non accumsan quam, vitae rhoncus est. Vivamus accumsan interdum lacus, nec hendrerit nunc fringilla in. Donec dictum molestie libero, vitae luctus leo. Vestibulum eros magna, porta sit amet nulla lacinia, dictum dapibus magna. Ut in erat sodales, blandit risus a, accumsan quam. Nam lacinia in mi sit amet varius. Duis sodales turpis ac sapien placerat sodales. Vivamus lacus odio, gravida non vulputate vel, lacinia eget velit. Proin dui quam, porttitor quis fringilla non, ultricies vitae lorem. Integer vitae lobortis libero, malesuada molestie odio. Aliquam mollis convallis arcu, nec facilisis libero condimentum vel. Fusce cursus mollis erat hendrerit pharetra.
Donec sed orci ac elit sollicitudin congue molestie eu mi. Ut ut diam quis enim dapibus mattis. Vestibulum gravida nisi non viverra dignissim. Mauris molestie et turpis ac consectetur. Proin nec augue et nisl vulputate euismod. Suspendisse ac bibendum erat, at pulvinar lacus. Proin massa eros, porta ut placerat in, auctor et felis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed lacinia in nibh a faucibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
Donec bibendum tristique urna quis eleifend. Praesent ut erat erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Etiam et neque non est tristique pulvinar nec commodo quam. Nam porttitor sollicitudin erat, eu consectetur ipsum consectetur ut. Nullam volutpat justo non risus egestas cursus. Nulla porttitor justo nisi, ac bibendum ante vulputate eu. Morbi ac tortor id felis dignissim malesuada.
</div>
</div>
</div>