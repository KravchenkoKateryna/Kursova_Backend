<?php
$this->title = "Додати подію";

/** @var array $event */

?>

<div class="container">
  <h1>Додати подію</h1>
  <div class="row">
    <div class="col-md-6">
      <form action="/events/add" method="post">
        <div class="form-group
                <?php if ($this->is_error_massage_exist('event_name')) echo 'has-error'; ?>">
          <label for="event_name">Назва події</label>
          <input type="text" class="form-control" id="event_name" name="event_name"
            value="<?php echo $this->post->event_name; ?>">
          <?php if ($this->is_error_massage_exist('event_name')): ?>
          <span class="help-block
                        <?php if ($this->is_error_massage_exist('event_name')) echo 'has-error'; ?>">
            <?php echo $this->get_error_massage('event_name'); ?>
          </span>
          <?php endif; ?>
        </div>
        <div class="form-group
                <?php if ($this->is_error_massage_exist('event_date')) echo 'has-error'; ?>">
          <label for="event_date">Дата події</label>
          <input type="date" class="form-control" id="event_date" name="event_date"
            value="<?php echo $this->post->event_date; ?>">
          <?php if ($this->is_error_massage_exist('event_date')): ?>
          <span class="help-block
                        <?php if ($this->is_error_massage_exist('event_date')) echo 'has-error'; ?>">
            <?php echo $this->get_error_massage('event_date'); ?>
          </span>
          <?php endif; ?>
        </div>
        <div class="form-group
                <?php if ($this->is_error_massage_exist('event_time')) echo 'has-error'; ?>">
          <label for="event_time">Час події</label>
          <input type="time" class="form-control" id="event_time" name="event_time"
            value="<?php echo $this->post->event_time; ?>">
          <?php if ($this->is_error_massage_exist('event_time')): ?>
          <span class="help-block
                        <?php if ($this->is_error_massage_exist('event_time')) echo 'has-error'; ?>">
            <?php echo $this->get_error_massage('event_time'); ?>
          </span>
          <?php endif; ?>
        </div>
        <div class="form-group
                <?php if ($this->is_error_massage_exist('event_place')) echo 'has-error'; ?>">
          <label for="event_place">Місце проведення</label>
          <input type="text" class="form-control" id="event_place" name="event_place"
            value="<?php echo $this->post->event_place; ?>">
          <?php if ($this->is_error_massage_exist('event_place')): ?>
          <span class="help-block
                        <?php if ($this->is_error_massage_exist('event_place')) echo 'has-error'; ?>">
            <?php echo $this->get_error_massage('event_place'); ?>
          </span>
          <?php endif; ?>
        </div>
        <div class="form-group
                <?php if ($this->is_error_massage_exist('event_description')) echo 'has-error'; ?>">
          <label for="event_description">Опис події</label>
          <textarea class="form-control" id="event_description" name="event_description"
            rows="5"><?php echo $this->post->event_description; ?></textarea>
          <?php if ($this->is_error_massage_exist('event_description')): ?>
          <span class="help-block
                        <?php if ($this->is_error_massage_exist('event_description')) echo 'has-error'; ?>">
            <?php echo $this->get_error_massage('event_description'); ?>
          </span>
          <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Додати</button>
      </form>
    </div>
  </div>
</div>