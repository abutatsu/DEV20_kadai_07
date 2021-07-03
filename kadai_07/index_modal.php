<form method="post" action="mem_insert.php" name="member_form" onsubmit="return Check()">
    <div class="form-group">
        <fieldset style="margin:20px">
            <legend>プレーヤー登録</legend>
            <div id="output">
                <label>背番号：<input type="text" class="form-control" name="number" placeholder="例) 01"></label><br>
                <label>名　前：<input type="text" class="form-control" name="name" placeholder="例) T.Anno"></label><br>
                <label>国　籍：<input type="text" class="form-control" name="country" placeholder="例) JPN"></label><br>
                <label>誕生日：<input type="date" class="form-control" name="birth"></label><br>
                <label>推定市場価格(万€)：<input type="text" class="form-control" name="value" placeholder="例) 1234"></label><br>
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
            </div>
        </fieldset>
    </div>
</form>