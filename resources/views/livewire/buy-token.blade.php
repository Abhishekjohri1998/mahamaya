<div>
    <?php
    if (Auth::user()->dashboard_style == "light") {
        $bg="light";
        $text = "dark";
    } else {
        $bg="dark";
        $text = "light";
    }
    ?>

    <x-danger-alert/>
    <x-success-alert/>

    <!-- MetaMask CSS Styles -->
    <style>
        .metamask-btn {
            background: linear-gradient(135deg, #f6851b, #e2761b);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .metamask-btn:hover {
            background: linear-gradient(135deg, #e2761b, #d0651b);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(246, 133, 27, 0.4);
            color: white;
        }
        
        .metamask-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
        
        .wallet-info {
            background: rgba(246, 133, 27, 0.1);
            padding: 20px;
            border-radius: 12px;
            margin: 15px 0;
            border: 2px solid rgba(246, 133, 27, 0.2);
        }
        
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid #ffffff;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 1s ease-in-out infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        .alert {
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }
        
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }
        
        .alert-warning {
            background-color: #fff3cd;
            color: #856404;
            border-color: #ffeaa7;
        }

        .metamask-card {
            background: linear-gradient(135deg, rgba(246, 133, 27, 0.1), rgba(226, 118, 27, 0.05));
            border: 2px solid rgba(246, 133, 27, 0.3);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .metamask-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(246, 133, 27, 0.2);
            border-color: #f6851b;
        }

        .token-calculation {
            background: rgba(0, 123, 255, 0.05);
            padding: 20px;
            border-radius: 12px;
            border: 2px solid rgba(0, 123, 255, 0.1);
        }

        .plus-minus-btn {
            background: #f6851b;
            border: none;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .plus-minus-btn:hover {
            background: #e2761b;
            transform: scale(1.1);
        }
    </style>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Buy {{$settings->token_symbol}} Tokens with MetaMask</h5>
                    <p class="card-text">Connect your MetaMask wallet to purchase {{$settings->token_symbol}} tokens directly with Ethereum. Secure, fast, and decentralized.</p>
                    
                    <!-- MetaMask Connection Section -->
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card metamask-card">
                                <div class="card-body text-center py-4">
                                    <img src="data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 212 189' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cpolygon fill='%23E17726' stroke='%23E17726' stroke-width='.25' points='20.133 1 88.5 59.21 103.113 27.84'/%3E%3Cpolygon fill='%23E27625' stroke='%23E27625' stroke-width='.25' points='191.867 1 123.067 59.71 108.887 27.84'/%3E%3Cpolygon fill='%23E27625' stroke='%23E27625' stroke-width='.25' points='68.267 76.58 61.467 87.41 88.033 88.99 88.967 61.83'/%3E%3Cpolygon fill='%23E27625' stroke='%23E27625' stroke-width='.25' points='124.067 61.83 124.933 88.99 151.533 87.41 144.733 76.58'/%3E%3C/g%3E%3C/svg%3E" alt="MetaMask" class="mb-3">
                                    <h6 class="mb-2"><i class="fab fa-ethereum"></i> <strong>MetaMask Wallet Payment</strong></h6>
                                    <p class="text-muted mb-0">Connect your MetaMask wallet to purchase tokens instantly</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- MetaMask Alerts -->
                    <div id="metamask-alerts" class="mb-3"></div>
                    
                    <!-- Wallet Connection Info -->
                    <div id="wallet-info" class="wallet-info" style="display: none;">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong><i class="fas fa-wallet"></i> Connected Wallet:</strong><br>
                                <code id="wallet-address" class="text-success"></code></p>
                                <p><strong><i class="fas fa-coins"></i> ETH Balance:</strong> <span id="wallet-balance" class="text-primary"></span> ETH</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong><i class="fas fa-network-wired"></i> Network:</strong> <span id="network-name" class="text-info"></span></p>
                                <p><strong><i class="fas fa-tag"></i> Token Price:</strong> <span class="text-warning">0.001 ETH per {{$settings->token_symbol}}</span></p>
                            </div>
                        </div>
                    </div>

                    <!-- Token Purchase Calculator -->
                    <div class="token-calculation">
                        <h5 class="card-title mb-4"><i class="fas fa-calculator"></i> Token Purchase Calculator</h5>
                        <p class="card-text">Enter the number of {{$settings->token_symbol}} tokens you want to purchase. The ETH amount will be calculated automatically.</p>
                        
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <label for="metamask-token-amount" class="form-label">Number of {{$settings->token_symbol}} Tokens</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="plus-minus-btn" type="button" onclick="decreaseTokenAmount()">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="number" id="metamask-token-amount" class="form-control text-center" value="100" min="1" onchange="updateMetaMaskCalculation()" onfocus="this.select()">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-primary text-white">{{$settings->token_symbol}}</span>
                                        <button class="plus-minus-btn" type="button" onclick="increaseTokenAmount()">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-2 text-center">
                                <h4 class="text-muted">=</h4>
                            </div>
                            
                            <div class="col-md-5">
                                <label for="metamask-eth-amount" class="form-label">ETH Amount Required</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="metamask-eth-amount" class="form-control text-center font-weight-bold" readonly value="0.100">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-warning text-dark"><i class="fab fa-ethereum"></i> ETH</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Amount Buttons -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <p class="mb-2"><strong>Quick Select:</strong></p>
                                <button class="btn btn-outline-primary btn-sm mr-2 mb-2" onclick="setTokenAmount(100)">100 {{$settings->token_symbol}}</button>
                                <button class="btn btn-outline-primary btn-sm mr-2 mb-2" onclick="setTokenAmount(500)">500 {{$settings->token_symbol}}</button>
                                <button class="btn btn-outline-primary btn-sm mr-2 mb-2" onclick="setTokenAmount(1000)">1,000 {{$settings->token_symbol}}</button>
                                <button class="btn btn-outline-primary btn-sm mr-2 mb-2" onclick="setTokenAmount(5000)">5,000 {{$settings->token_symbol}}</button>
                                <button class="btn btn-outline-primary btn-sm mr-2 mb-2" onclick="setTokenAmount(10000)">10,000 {{$settings->token_symbol}}</button>
                            </div>
                        </div>

                        <!-- Purchase Buttons -->
                        <div class="text-center">
                            <button id="connect-btn" class="metamask-btn mb-3" onclick="connectWallet()">
                                <i class="fab fa-ethereum"></i> Connect MetaMask Wallet
                            </button>
                            <button id="purchase-btn" class="metamask-btn mb-3" onclick="purchaseTokens()" style="display: none;">
                                <span id="btn-text"><i class="fas fa-shopping-cart"></i> Purchase Tokens Now</span>
                            </button>
                        </div>

                        <div class="text-center">
                            <p class="text-info mb-0"><i class="fas fa-info-circle"></i> Tokens will be transferred to your wallet immediately after successful payment confirmation on the blockchain.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="row">
                @if (empty(Auth::user()->wallet_address))
                <div class="col-12 mb-3">
                    <a href="#" data-toggle="modal" data-target="#walletmodal" class="text-white text-decoration-none">
                        <div class="card bg-danger">
                            <div class="card-body">
                                <i class="fas fa-exclamation-triangle mb-2"></i>
                                <span class="card-text d-block">Add your wallet address before you buy tokens</span>
                                <span class="float-right"><i class="fas fa-arrow-right"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
                @else
                <div class="col-12 mb-3">
                    <a href="#" data-toggle="modal" data-target="#walletmodal" class="text-white text-decoration-none">
                        <div class="card bg-info">
                            <div class="card-body">
                                <i class="fas fa-edit mb-2"></i>
                                <span class="card-text d-block">Update your wallet address</span>
                                <span class="float-right"><i class="fas fa-arrow-right"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
                
                <div class="col-12 mb-3">
                    <div class="text-white card bg-primary">
                        <div class="card-body text-center">
                            <i class="fas fa-coins fa-2x mb-3"></i>
                            <p class="card-text mb-1">YOUR TOKEN BALANCE</p>
                            <h2 class="mt-0 mb-0">{{number_format(Auth::user()->tot_tk_bal)}}</h2>
                            <small>{{$settings->token_symbol}} Tokens</small>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="card bg-{{$bg}} border-warning">
                        <div class="card-body">
                            <h6 class="card-title text-warning"><i class="fas fa-shield-alt"></i> Security Notice</h6>
                            <ul class="list-unstyled mb-0 small">
                                <li><i class="fas fa-check text-success"></i> Always verify the contract address</li>
                                <li><i class="fas fa-check text-success"></i> Ensure you're on the correct network</li>
                                <li><i class="fas fa-check text-success"></i> Keep sufficient ETH for gas fees</li>
                                <li><i class="fas fa-check text-success"></i> Double-check transaction details</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card bg-{{$bg}} border-info">
                        <div class="card-body">
                            <h6 class="card-title text-info"><i class="fas fa-question-circle"></i> Need Help?</h6>
                            <p class="small mb-2">Having trouble with MetaMask?</p>
                            <a href="https://metamask.io/faqs/" target="_blank" class="btn btn-outline-info btn-sm">
                                <i class="fas fa-external-link-alt"></i> MetaMask Help Center
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Web3 and MetaMask Integration Script -->
    <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
    <script>
        // Configuration
        const CONFIG = {
            contractAddress: '0xf66cc5B1a36f97996b6feced5C6FC6C2a96225CA', // Replace with your actual contract address
            chainId: '0x1', // Ethereum Mainnet
            chainName: 'Ethereum Mainnet',
            tokenPrice: 0.001, // Price per token in ETH (adjust as needed)
            rpcUrl: 'https://mainnet.infura.io/v3/YOUR_INFURA_PROJECT_ID', // Replace with your Infura project ID
            gasLimit: 100000
        };

        // Global variables
        let web3;
        let userAccount;
        let connected = false;

        // Initialize Web3
        async function initWeb3() {
            try {
                if (typeof window.ethereum !== 'undefined') {
                    web3 = new Web3(window.ethereum);
                    console.log('MetaMask detected');
                    
                    // Check if already connected
                    const accounts = await web3.eth.getAccounts();
                    if (accounts.length > 0) {
                        userAccount = accounts[0];
                        connected = true;
                        updateUI();
                    }
                } else {
                    console.log('MetaMask not detected');
                    showAlert('Please install MetaMask extension to purchase tokens. <a href="https://metamask.io/" target="_blank">Download MetaMask</a>', 'warning');
                }
            } catch (error) {
                console.error('Web3 initialization error:', error);
                showAlert('Failed to initialize Web3', 'error');
            }
        }

        // Token amount controls
        function increaseTokenAmount() {
            const input = document.getElementById('metamask-token-amount');
            const currentValue = parseInt(input.value) || 0;
            input.value = currentValue + 100;
            updateMetaMaskCalculation();
        }

        function decreaseTokenAmount() {
            const input = document.getElementById('metamask-token-amount');
            const currentValue = parseInt(input.value) || 0;
            const newValue = currentValue - 100;
            input.value = newValue > 0 ? newValue : 1;
            updateMetaMaskCalculation();
        }

        function setTokenAmount(amount) {
            document.getElementById('metamask-token-amount').value = amount;
            updateMetaMaskCalculation();
        }

        // Update MetaMask calculation
        function updateMetaMaskCalculation() {
            const tokenAmount = parseInt(document.getElementById('metamask-token-amount').value) || 0;
            const ethAmount = (tokenAmount * CONFIG.tokenPrice).toFixed(6);
            document.getElementById('metamask-eth-amount').value = ethAmount;
        }

        // Connect to MetaMask
        async function connectWallet() {
            try {
                if (typeof window.ethereum === 'undefined') {
                    showAlert('MetaMask not installed. Please install MetaMask extension first. <a href="https://metamask.io/" target="_blank">Download MetaMask</a>', 'error');
                    return;
                }

                // Request account access
                const accounts = await window.ethereum.request({
                    method: 'eth_requestAccounts'
                });

                if (accounts.length === 0) {
                    showAlert('No accounts found. Please create an account in MetaMask.', 'error');
                    return;
                }

                // Switch to correct network
                await switchToEthereumNetwork();

                userAccount = accounts[0];
                connected = true;
                updateUI();
                showAlert('Wallet connected successfully! You can now purchase tokens.', 'success');

            } catch (error) {
                console.error('Error connecting wallet:', error);
                if (error.code === 4001) {
                    showAlert('Connection rejected by user. Please connect your wallet to purchase tokens.', 'warning');
                } else {
                    showAlert('Failed to connect wallet: ' + error.message, 'error');
                }
            }
        }

        // Switch to Ethereum network
        async function switchToEthereumNetwork() {
            try {
                await window.ethereum.request({
                    method: 'wallet_switchEthereumChain',
                    params: [{ chainId: CONFIG.chainId }]
                });
            } catch (switchError) {
                if (switchError.code === 4902) {
                    try {
                        await window.ethereum.request({
                            method: 'wallet_addEthereumChain',
                            params: [{
                                chainId: CONFIG.chainId,
                                chainName: CONFIG.chainName,
                                rpcUrls: [CONFIG.rpcUrl],
                                nativeCurrency: {
                                    name: 'ETH',
                                    symbol: 'ETH',
                                    decimals: 18
                                }
                            }]
                        });
                    } catch (addError) {
                        throw new Error('Failed to add Ethereum network');
                    }
                } else {
                    throw switchError;
                }
            }
        }

        // Purchase tokens
        async function purchaseTokens() {
            if (!connected) {
                showAlert('Please connect your wallet first', 'warning');
                await connectWallet();
                return;
            }

            const tokenAmount = parseInt(document.getElementById('metamask-token-amount').value);
            if (tokenAmount <= 0 || isNaN(tokenAmount)) {
                showAlert('Please enter a valid token amount (minimum 1 token)', 'error');
                return;
            }

            const ethAmount = (tokenAmount * CONFIG.tokenPrice);
            
            // Check if user has enough balance
            try {
                const balance = await web3.eth.getBalance(userAccount);
                const balanceInEth = parseFloat(web3.utils.fromWei(balance, 'ether'));
                const requiredEth = ethAmount + 0.01; // Adding gas fee buffer
                
                if (balanceInEth < requiredEth) {
                    showAlert(`Insufficient balance! You need at least ${requiredEth.toFixed(6)} ETH (including gas fees). Your current balance: ${balanceInEth.toFixed(6)} ETH`, 'error');
                    return;
                }
            } catch (error) {
                showAlert('Failed to check balance. Please try again.', 'error');
                return;
            }
            
            try {
                setButtonLoading(true);
                showAlert('Please confirm the transaction in your MetaMask wallet...', 'warning');

                const transaction = {
                    from: userAccount,
                    to: CONFIG.contractAddress,
                    value: web3.utils.toWei(ethAmount.toString(), 'ether'),
                    gas: CONFIG.gasLimit
                };

                const txHash = await web3.eth.sendTransaction(transaction);
                
                showAlert(`Transaction submitted successfully! 🎉<br>Transaction Hash: <code>${txHash.transactionHash}</code><br><a href="https://etherscan.io/tx/${txHash.transactionHash}" target="_blank">View on Etherscan</a>`, 'success');
                console.log('Transaction hash:', txHash.transactionHash);

                // TODO: Add backend integration to record the purchase
                // You might want to send the transaction details to your backend here
                /*
                fetch('/api/record-metamask-purchase', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        wallet_address: userAccount,
                        token_amount: tokenAmount,
                        eth_amount: ethAmount,
                        transaction_hash: txHash.transactionHash
                    })
                });
                */

            } catch (error) {
                console.error('Purchase error:', error);
                if (error.code === 4001) {
                    showAlert('Transaction rejected by user. The purchase was cancelled.', 'warning');
                } else if (error.message.includes('insufficient funds')) {
                    showAlert('Insufficient funds for gas fees. Please add more ETH to your wallet.', 'error');
                } else {
                    showAlert('Transaction failed: ' + error.message, 'error');
                }
            } finally {
                setButtonLoading(false);
            }
        }

        // Update UI based on connection status
        async function updateUI() {
            const connectBtn = document.getElementById('connect-btn');
            const purchaseBtn = document.getElementById('purchase-btn');
            const walletInfo = document.getElementById('wallet-info');

            if (connected && userAccount) {
                try {
                    // Hide connect button, show purchase button
                    connectBtn.style.display = 'none';
                    purchaseBtn.style.display = 'block';
                    
                    // Update wallet info
                    const balance = await web3.eth.getBalance(userAccount);
                    const ethBalance = web3.utils.fromWei(balance, 'ether');
                    const networkId = await web3.eth.net.getId();
                    
                    document.getElementById('wallet-address').textContent = 
                        userAccount.substring(0, 8) + '...' + userAccount.substring(34);
                    document.getElementById('wallet-balance').textContent = parseFloat(ethBalance).toFixed(6);
                    
                    // Update network name
                    const networkName = networkId === 1 ? 'Ethereum Mainnet' : networkId === 11155111 ? 'Sepolia Testnet' : `Network ID: ${networkId}`;
                    document.getElementById('network-name').textContent = networkName;
                    
                    walletInfo.style.display = 'block';

                    // Show warning if balance is too low
                    if (parseFloat(ethBalance) < 0.01) {
                        showAlert('⚠️ Your ETH balance is very low. You need ETH to make transactions and pay gas fees. Consider adding more ETH to your wallet.', 'warning');
                    }
                    
                } catch (error) {
                    console.error('Error updating UI:', error);
                    showAlert('Failed to load wallet information. Please refresh the page.', 'error');
                }
            } else {
                // Show connect button, hide purchase button
                connectBtn.style.display = 'block';
                purchaseBtn.style.display = 'none';
                walletInfo.style.display = 'none';
            }
        }

        // Set button loading state
        function setButtonLoading(loading) {
            const btn = document.getElementById('purchase-btn');
            const btnText = document.getElementById('btn-text');
            
            if (loading) {
                btn.disabled = true;
                btnText.innerHTML = '<div class="loading"></div> Processing Transaction...';
            } else {
                btn.disabled = false;
                btnText.innerHTML = '<i class="fas fa-shopping-cart"></i> Purchase Tokens Now';
            }
        }

        // Show alert messages
        function showAlert(message, type) {
            const alertContainer = document.getElementById('metamask-alerts');
            
            let alertClass, icon;
            switch(type) {
                case 'success': 
                    alertClass = 'alert-success';
                    icon = '<i class="fas fa-check-circle"></i>';
                    break;
                case 'warning': 
                    alertClass = 'alert-warning';
                    icon = '<i class="fas fa-exclamation-triangle"></i>';
                    break;
                case 'error': 
                default: 
                    alertClass = 'alert-error';
                    icon = '<i class="fas fa-times-circle"></i>';
                    break;
            }
            
            alertContainer.innerHTML = `
                <div class="alert ${alertClass}">
                    ${icon} ${message}
                </div>
            `;

            // Clear alert after 10 seconds for success/warning, 8 seconds for errors
            const timeout = type === 'success' ? 10000 : 8000;
            setTimeout(() => {
                alertContainer.innerHTML = '';
            }, timeout);
        }

        // Listen for account changes
        if (window.ethereum) {
            window.ethereum.on('accountsChanged', function (accounts) {
                if (accounts.length === 0) {
                    connected = false;
                    userAccount = null;
                    showAlert('Wallet disconnected. Please reconnect to continue.', 'warning');
                } else {
                    userAccount = accounts[0];
                    connected = true;
                    showAlert('Account changed successfully.', 'success');
                }
                updateUI();
            });

            window.ethereum.on('chainChanged', function (chainId) {
                showAlert('Network changed. Page will reload to ensure proper functionality...', 'warning');
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            });
        }

        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            initWeb3();
            updateMetaMaskCalculation();
        });
    </script>
</div>
