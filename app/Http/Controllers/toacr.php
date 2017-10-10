<?php
use App\File;

return $file = File::where('indexed', 0)->first();