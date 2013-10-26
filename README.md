# phava

A utility library for PHP inspired by Guava

This will be a port in spirit. It won't be API compatible with Guava, and with good reason. For example, PHP's automatic type conversion makes most of the null-related utility methods in the Strings class unnecessary. Phava aims to take into account and leverage these differences where appropriate. 

I think the improvement in code quality of using a call like `Strings::isEmpty($var)` over `strlen($var) === 0` is self-evident.

## Status

Phava is under development. Since I'm the only person using this for now, development is happening directly on the master branch. If this project gets some stars, I'll dev on a dev branch and do pull requests. Hint, hint!

## Contribution

If there's something from Guava that you'd like added to this project (and which makes sense in PHP-land), please send a pull request!

## License

    Copyright 2013 Carlton Whitehead
    
    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at
    
       http://www.apache.org/licenses/LICENSE-2.0
    
    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.