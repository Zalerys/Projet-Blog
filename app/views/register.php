<div class="index">
    <section class="container container--sign-up">
        <form class="containerform" method="post">
            <label class="containerformlabel">
                Username
                <input class="containerforminput" name="username" type="text" required>
            </label>
            <label class="containerformlabel">
                Email
                <input class="containerforminput" name="email" type="text" required>
            </label>
            <label class="containerformlabel">
                Password
                <input class="containerforminput" name="password" type="password" required>
            </label>
            <label class="containerformlabel">Admin
                <span class=" containerform--checkbox">
                    <input name="admin" type='hidden' value='0'>
                    <input name="admin" type="checkbox" value="1">
                    <span class="slider round"></span>
                </span>
            </label>
            <input class="containerformsubmit" name="submit" type="submit" value="SIGN UP">
        </form>
        <p>Already registered ? <a href="/login" class="underline">Log in</a></p>
    </section>
</div>