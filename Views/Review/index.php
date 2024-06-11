<?php
    $this->title = 'Відгуки';
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>Відгуки</h1>
      <div class="row">
        <form action="/review/submit" method="post">
          <div class="col-md-12">
            <div class="form-group">
              <label for="comment">Ваш відгук:</label>
              <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
            </div>
            <div class="form-group
                    ">
              <label for="rating">Ваша оцінка:</label>
              <select class="form-control" id="rating" name="rating">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5" selected>5</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Відправити</button>
          </div>
        </form>
      </div>

      <div class="row">
        <div class="col-md-12">
          <h2>Відгуки:</h2>
          <div class="list-group">
            <?php 
                        if (empty($reviews)) {
                            echo '<div class="list-group-item">Поки що немає відгуків</div>';
                        }
                        else{
                        foreach ($reviews as $review): ?>
            <div class="list-group-item">
              <h4 class="list-group-item-heading">Відгук від користувача <?php echo $review['user']; ?>
              </h4>
              <p class="list-group-item-text">Оцінка: <?php echo $review['rating']; ?></p>
              <p class="list-group-item-text">Дата: <?php echo $review['date']; ?></p>
              <p class="list-group-item-text">Коментар: <?php echo $review['comment']; ?></p>
              <?php if ($isAdmin) { ?>
              <a href="/review/delete/<?php echo $review['id']; ?>" class="btn btn-danger">Видалити</a>
              <?php } ?>
            </div>
            <?php endforeach; }?>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>