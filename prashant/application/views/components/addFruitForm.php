<h2>Add Product Form</h2>
<form action="<?php echo BASEURL;?>/public/home/addFruit" method="POST">
<div class="form-group">
<input type="text" name="name" class="form-control" placeholder=" Name..." value="<?php if($data['name']): echo $data['name']; endif; ?>">

</div>
<div class="form-group">
<input type="number" name="price" class="form-control" placeholder=" Price..." value="<?php if($data['price']): echo $data['price']; endif; ?>">

</div>

<div class="form-group">
<select name="quality" class="form-control" value="<?php if($data['quality']): echo $data['quality']; endif; ?>">
    <option value="">Select Quality</option>
    <option value="a">A</option>
    <option value="b">B</option>
    <option value="c">C</option>
</select>

</div>

<div class="form-group">
    <input type="submit" value="Add Product" class="btn btn-primary">
</div>

</form>