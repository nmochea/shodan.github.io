<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shodan Dorker</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="container">
    <h1>Shodan Dorker</h1>
    <form id="scannerForm">
      <div class="social-icons">
        <a href="https://www.linkedin.com/in/nmochea" target="_blank" title="LinkedIn"><i class="fab fa-linkedin" alt="LinkedIn"></i></a>
        <a href="https://nmochea.medium.com/" target="_blank" title="Medium"><i class="fab fa-medium" alt="Medium"></i></a>
        <a href="https://forms.gle/pmz5mANJiuSQiEdz9" target="_blank" title="Google"><i class="fab fa-google" alt="Google"></i></a>
      </div>
      
      <label for="urlInput">Enter Domain:</label>
      <input type="text" id="urlInput" placeholder="e.g., google.com" required>
      <label for="scanType">Select Shodan Type:</label>
      <select id="scanType">
      <?php
          // Read options from option.txt
          $options = file('option.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

          // Generate options dynamically
          foreach ($options as $option) {
            // Escape double quotes in the option value
            $escapedOption = htmlspecialchars($option, ENT_QUOTES, 'UTF-8');
            echo "<option value=\"$escapedOption\">$escapedOption</option>";
          }
        ?>
      </select>
      <button type="button" onclick="performScan()">Submit</button>
    </form>
  </div>
  <script type="text/javascript">
  function performScan() {

    var urlInputValue = document.getElementById('urlInput').value;
    var scanTypeValue = document.getElementById('scanType').value;

    var searchQuery = `https://www.shodan.io/search?query=${encodeURIComponent(scanTypeValue.replace('${target}', urlInputValue))}`;

    window.open(searchQuery, '_blank');
  }
</script>
</body>
</html>
