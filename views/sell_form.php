<!-- This displays the sell form which has 1 textbox and 1 submit button-->
<form action="sell.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="stock" placeholder="Stock" type="text"/>
        </div>
        <div class="form-group">
            <input autofocus class="form-control" name="shares" placeholder="Shares" type="text"/>
        </div>

        <div class="form-group">
            <button class="btn btn-default" type="submit">Sell</button>
        </div>
    </fieldset>
</form>
