<script src="/js/cart.js"></script>

<div class="container">
  <h1 class="text-center"><?php echo $this->title; ?></h1>
  <div class="row text-center">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <img src="<?php echo explode(',', $this->item['images'])[0]; ?>" class="img-fluid" alt="..."
        style="height: 400px;">
    </div>
    <div class="col-md-2"></div>
  </div>
  <div class="row mb-5">
    <div>
      <p><?php echo $this->item['description']; ?></p>
      <p>Ціна: <?php echo $this->item['price']; ?> грн</p>
    </div>
    <div class="col-md-4">
        <input type="hidden" name="id" value="<?php echo $this->item['id']; ?>">
        <button type="submit" class="btn btn-success" onclick="addToCart(<?php echo $this->item['id']; ?>)">Додати в кошик</button>
     
    </div>
  </div>
</div>