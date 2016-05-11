<?php
return array(
    // set your paypal credential
    'client_id' => 'AVdjgJ9_MM6D4_R2yZ1FTbdN2LDI2inEmEHgNa3WCAFM5tSNj1ZVXg3GNVVyuJrZRS2JmGLuH3DjdmT9',
    'secret' => 'EL6TtAbxjvNz2ZrL_LPemL9IYqiXbzu1EmpuFSdOieyloJLLeqc0H2ym6FtzDTo7IxaO5xUio1xx1ueG',
 
    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',
 
        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,
 
        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,
 
        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',
 
        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);