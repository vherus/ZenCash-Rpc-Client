# vherus/ZenCash-Rpc-Client

[![Build Status](https://travis-ci.org/vherus/ZenCash-Rpc-Client.svg?branch=master)](https://travis-ci.org/vherus/ZenCash-Rpc-Client)

This is a modern PHP package for interacting with ZenCash RPC commandline.

### Installation

TODO

### Example Usage

The easiest way to use this package is by using the built in *native* RPC client which depends on *guzzlehttp*.

```php
$rpc = new ZenCash\Rpc\Rpc('localhost', 'rpcuser', 'password');
$client = new ZenCash\Rpc\Native\Client($rpc, $guzzleHttpClient);

// Client::execute returns a PSR7 HTTP Response object
$response = $client->execute(new ZenCash\Rpc\Command\Wallet\GetNewAddress);
```

All commands are named in such a way that it's intuitive to figure out the command to use based on the existing ZenCash CLI commands (e.g. *getwalletinfo* exists as `ZenCash\Rpc\Command\Wallet\GetWalletInfo`)

### Easy Mode Setup Pre-requisites

- [docker-ce](https://www.docker.com/community-edition)
- [docker-compose](https://docs.docker.com/compose)

### Easy Mode

Once you've completed the pre-requisite steps above, run `bin/setup` from the project root directory.

The setup script creates a Composer docker container to install project dependencies, removes the container, builds & runs a php-cli container and executes the test suite.

You're welcome to install `PHP >= 7.2` and `PHPUnit` on your local machine instead if you want to go hardcore.

### License

This program is distributed under an [MIT License](https://github.com/vherus/ZenCash-Rpc-Client/raw/master/LICENSE).

### Disclaimer

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

### Donation t_address

znhZ93NLD2smn4XD9CZ4cz8yNagfJjrCu35
