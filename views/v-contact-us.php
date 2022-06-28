<main class="mb-5" style="background-image: url('./public/theme/img/Library.jpg' ); height: 1000px;" >
    <div class="container"> 
        
        <h1 class="text-white pt-5 pd-5">Contact Us</h1>
            <form class="p-4 text-white" action="./contact-us-page.php" method="post" style="border: solid black 2px; border-radius: 2%; width: 700px;">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" >
                    <?php if (!empty($systemErrors['name'])) { ?>
                        <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['name']); ?></small>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" >
                    <?php if (!empty($systemErrors['email'])) { ?>
                        <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['email']); ?></small>
                    <?php } ?>
                </div>
                
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" placeholder="Comment" name="message"></textarea>
                    <?php if (!empty($systemErrors['message'])) { ?>
                        <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['message']); ?></small>
                    <?php } ?>
                </div>
                
                <button type="submit" class="btn btn-success mt-5 mb-5" name="send" value="yes">Send</button>
            </form>
        </div>
        </main>