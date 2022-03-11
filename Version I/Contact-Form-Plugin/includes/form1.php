<div class="container">
    <form id="myForm">
  
      <div class="form-group">
       
        <label for="fname">First Name</label>
        <input class="form-control" type="text" id="fname" name="firstname" placeholder="Your name..">
        <div hidden class="alert alert-danger" role="alert"></div>
      </div>
  
      <div class="form-group">
        <label for="lname">Last Name</label>
        <input class="form-control" type="text" id="lname" name="lastname" placeholder="Your last name..">
        <div hidden class="alert alert-danger" role="alert"></div>
      </div>
  
      <div class="form-group">
        <label for="email">Email </label>
        <input class="form-control" type="email" id="email" name="email" placeholder="Your email..">
        <div hidden class="alert alert-danger" role="alert"></div>
      </div>
  
      <div class="form-group">
        <label for="subject">Subject</label>
        <div hidden class="alert alert-danger" role="alert"></div>
        <textarea class="form-control" id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
      </div>
  
      <br>
      <input class="btn btn-lg btn-primary" type="submit" value="Submit">
    </form>
  </div>