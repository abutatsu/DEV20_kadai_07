<form method="post" action="trf_insert.php">
  <div class="form-group">
   <fieldset style="margin:20px">
    <legend>ターゲット登録</legend>
     <label>名　前：<input type="text" class="form-control" name="name" placeholder="T.anno"></label><br>
     <label>国　籍：<input type="text" class="form-control" name="country" placeholder="JPN"></label><br>
     <label>誕生日：<input type="date" class="form-control" name="birth"></label><br>
     <label>交渉価格：<input type="text" class="form-control" name="value" placeholder="1234"></label><br>
     <label>ポジション：
      <select name= "position">
        <option value = "FW">FW</option>
        <option value = "MF">MF</option>
        <option value = "DF">DF</option>
        <option value = "GK">GK</option>
      </select>
    </label><br>
     <label>コメント：<textArea name="comment" class="form-control" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信" class="btn btn-primary">
     <input type="hidden" name="token" value="<?=h($_SESSION['token']); ?>">
    </fieldset>
  </div>
</form>