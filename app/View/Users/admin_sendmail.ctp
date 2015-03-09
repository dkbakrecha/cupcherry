<?php

?>

<?php

echo $this->Form->create('User');
echo $this->Form->input('name');
echo $this->Form->input('to');
echo $this->Form->input('message');
echo $this->Form->submit('Send');
echo $this->Form->end();
?>