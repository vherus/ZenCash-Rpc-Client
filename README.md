# vherus/package-bootstrap

### Easy Mode Pre-requisites

- [docker-ce](https://www.docker.com/community-edition)
- [docker-compose](https://docs.docker.com/compose)

### Easy Mode

Once you've completed the pre-requisite steps above, run `bin/setup` from the project root directory.

The setup script creates a Composer docker container to install project dependencies, removes the container, builds & runs a php-cli container and executes the test suite.

You're welcome to install `PHP >= 7.2` and `PHPUnit` on your local machine instead if you want to go hardcore.

### License
This program is distributed under an [MIT License](https://github.com/vherus/package-bootstrap/raw/master/LICENSE).

### Disclaimer

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
