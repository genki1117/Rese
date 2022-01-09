<form action="/imgupload" method='post' enctype="multipart/form-data">
    @csrf
    <input type="file" name="shop_Img">
    <button>送信</button>
</form>

<img src="storage/sushi.jpg">
