<main class="mt-5 mb-5" style="background-image: url('./public/theme/img/Library.jpg' ); height: 1000px;" >
    <div class="container"> 
        
        <h1 class="text-white pt-5 pd-5">Login</h1>
            <form class="p-4 text-white" action="./page-not-found.php" method="POST" style="border: solid black 2px; border-radius: 2%; width: 700px;">
                
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" >
                    <?php if (!empty($systemErrors['email'])) { ?>
                        <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['email']); ?></small>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="text" class="form-control" id="password" placeholder="Enter password" name="password" >
                    <?php if (!empty($systemErrors['password'])) { ?>
                        <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['password']); ?></small>
                    <?php } ?>
                </div>
                
                <button type="submit" class="btn btn-success mt-5 mb-5" name="log" value="Login">Login</button>
            </form>
        </div>
        </main>