<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Chosen Palette: Energetic & Playful -->
    <!-- Application Structure Plan: The infographic follows a narrative structure. It starts by defining the core business problem (fragmentation), presents dynamik.app as the unified solution, introduces the core team to build credibility, quantifies the market opportunity with charts, outlines the strategic 6-phase roadmap using a visual timeline, and concludes with clear first-year financial projections and funding needs. This structure is designed to logically guide an investor from the market pain point to the financial potential, making the business case clear and compelling. -->
    <!-- Visualization & Content Choices:
        - Team Section: Goal: Inform. Viz: Grid of cards (HTML/CSS) to introduce team members and roles. Justification: A simple, clean grid is effective for presenting personnel information clearly.
        - Market Size: Goal: Inform. Viz: Donut Chart (Chart.js) to show the composition of the total addressable market. Justification: A donut chart is excellent for showing simple proportions of a whole.
        - Development Roadmap: Goal: Organize. Viz: A dynamic, flowing roadmap design using HTML/CSS. Justification: This new design more effectively visualizes the progression of development phases as a clear journey, which is more engaging for a user than a static timeline. NO SVG/Mermaid used.
        - Financial Projections: Goal: Inform. Viz: Big Number Stats (HTML/CSS) for key metrics. Justification: Large, bold numbers create a strong visual impact for critical financial data points.
    -->
    <!-- CONFIRMATION: NO SVG graphics used. NO Mermaid JS used. -->
    <title>dynamik.app | Business Plan Infographic</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F0F4F8;
        }
        .chart-container {
            position: relative;
            width: 100%;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
            height: 320px;
            max-height: 350px;
        }
        .roadmap {
            position: relative;
            padding-bottom: 2rem;
        }
        .roadmap-line {
            position: absolute;
            top: 25px;
            left: 20px;
            right: 20px;
            height: 4px;
            background-color: #CBD5E0;
            z-index: 1;
        }
        .roadmap-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            position: relative;
        }
        .roadmap-phase {
            position: relative;
            width: 100%;
            padding-top: 50px;
            text-align: center;
        }
        .roadmap-dot {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 30px;
            background-color: #FF6B6B;
            border-radius: 50%;
            border: 4px solid #F0F4F8;
            z-index: 2;
        }
        .roadmap-card {
            background-color: #ffffff;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 1.5rem;
            margin-top: 1rem;
        }
        @media (min-width: 768px) {
            .roadmap-phase {
                width: 16.66%;
            }
            .roadmap-card {
                height: auto;
            }
        }
    </style>
</head>
<body class="text-gray-800">
<div class="container mx-auto p-4 sm:p-8 max-w-6xl">
    <header class="text-center mb-16">
        <h1 class="text-5xl md:text-6xl font-extrabold text-[#4D648D] mb-2">dynamik.app</h1>
        <p class="text-xl md:text-2xl text-[#283655]">An Investor's Guide to the All-in-One Business Solution</p>
    </header>

    <main>
        <section class="mb-20">
            <h2 class="text-3xl font-bold text-center mb-4 text-[#4D648D]">The Problem: Digital Chaos for Businesses</h2>
            <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-xl p-8 mb-6 text-center">
                <p class="text-lg leading-relaxed text-gray-700">
                    Today's businesses operate in a state of digital fragmentation. They rely on a patchwork of disconnected applications for critical functions—accounting, project management, asset tracking, and compliance. This inefficiency creates data silos, increases the risk of errors, and wastes valuable time and resources that could be spent on growth.
                </p>
            </div>
        </section>

        <section class="mb-20">
            <h2 class="text-3xl font-bold text-center mb-10 text-[#4D648D]">Our Solution: A Single, Unified Platform</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white rounded-lg shadow-xl p-6 text-center transform hover:scale-105 transition-transform duration-300">
                    <div class="text-5xl mb-4">⚙️</div>
                    <h3 class="text-xl font-semibold mb-2 text-[#4D648D]">Total Business Oversight</h3>
                    <p class="text-gray-600">Manage companies, projects, clients, suppliers, employees, and all assets (tools, vehicles, products) from one central hub.</p>
                </div>
                <div class="bg-white rounded-lg shadow-xl p-6 text-center transform hover:scale-105 transition-transform duration-300">
                    <div class="text-5xl mb-4">📊</div>
                    <h3 class="text-xl font-semibold mb-2 text-[#4D648D]">Integrated Accounting</h3>
                    <p class="text-gray-600">Handle estimates, invoices, expenses, and purchase orders seamlessly within the same ecosystem.</p>
                </div>
                <div class="bg-white rounded-lg shadow-xl p-6 text-center transform hover:scale-105 transition-transform duration-300">
                    <div class="text-5xl mb-4">📜</div>
                    <h3 class="text-xl font-semibold mb-2 text-[#4D648D]">Automated Compliance</h3>
                    <p class="text-gray-600">Generate and manage official certifications and compliance documents with AI-powered assistance.</p>
                </div>
                <div class="bg-white rounded-lg shadow-xl p-6 text-center transform hover:scale-105 transition-transform duration-300">
                    <div class="text-5xl mb-4">🛒</div>
                    <h3 class="text-xl font-semibold mb-2 text-[#4D648D]">Professional Marketplace</h3>
                    <p class="text-gray-600">Connect with a network of professionals for services like web design, accounting, and copywriting.</p>
                </div>
            </div>
        </section>

        <section class="mb-20">
            <h2 class="text-3xl font-bold text-center mb-10 text-[#4D648D]">Meet the Core Team</h2>
            <div class="max-w-4xl mx-auto grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 text-center">
                <div class="bg-white rounded-lg shadow-xl p-6">
                    <div class="text-5xl mb-3">👨‍💻</div>
                    <h3 class="text-lg font-bold text-[#4D648D]">Daniel Grigoras</h3>
                    <p class="text-gray-600">Frontend Developer</p>
                </div>
                <div class="bg-white rounded-lg shadow-xl p-6">
                    <div class="text-5xl mb-3">👨‍💻</div>
                    <h3 class="text-lg font-bold text-[#4D648D]">George Dobre</h3>
                    <p class="text-gray-600">Backend Developer</p>
                </div>
                <div class="bg-white rounded-lg shadow-xl p-6">
                    <div class="text-5xl mb-3">🎨</div>
                    <h3 class="text-lg font-bold text-[#4D648D]">Ciprian Sutu</h3>
                    <p class="text-gray-600">Web Designer</p>
                </div>
                <div class="bg-white rounded-lg shadow-xl p-6">
                    <div class="text-5xl mb-3">📈</div>
                    <h3 class="text-lg font-bold text-[#4D648D]">Vlad Minea</h3>
                    <p class="text-gray-600">Project Manager</p>
                </div>
                <div class="bg-white rounded-lg shadow-xl p-6 border-2 border-dashed border-gray-400">
                    <div class="text-5xl mb-3">❓</div>
                    <h3 class="text-lg font-bold text-[#4D648D]">Sales Professional</h3>
                    <p class="text-gray-600">(Hiring Need)</p>
                </div>
            </div>
        </section>

        <section class="mb-20">
            <h2 class="text-3xl font-bold text-center mb-10 text-[#4D648D]">The UK Market Opportunity</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="bg-white rounded-lg shadow-xl p-8">
                    <h3 class="text-2xl font-semibold text-center mb-4 text-[#4D648D]">Total Addressable Market</h3>
                    <div class="chart-container">
                        <canvas id="marketChart"></canvas>
                    </div>
                    <p class="text-center mt-4 text-gray-600">A substantial market of over 9.25 million businesses in the UK are potential customers.</p>
                </div>
                <div class="bg-white rounded-lg shadow-xl p-8 text-center">
                    <div class="text-7xl font-extrabold text-[#FF6B6B]">9.25M</div>
                    <p class="text-2xl text-[#4D648D] font-semibold mb-6">Potential Customers</p>
                    <h3 class="text-2xl font-semibold text-center mb-4 text-[#4D648D]">First-Year Revenue Projection</h3>
                    <div class="text-6xl font-extrabold text-[#1E96FC]">£4.6M</div>
                    <p class="text-xl text-[#4D648D] font-semibold">Projected Annual Revenue</p>
                    <p class="mt-4 text-gray-600">Based on capturing a conservative 0.1% of the market at a competitive price point of £42/month.</p>
                </div>
            </div>
        </section>

        <section class="mb-20">
            <h2 class="text-3xl font-bold text-center mb-10 text-[#4D648D]">Our Strategic 6-Phase Roadmap</h2>
            <div class="roadmap">
                <div class="roadmap-container">
                    <div class="roadmap-phase">
                        <div class="roadmap-dot"></div>
                        <div class="roadmap-card">
                            <h3 class="text-xl font-bold text-[#4D648D]">Phase 1</h3>
                            <p class="text-sm font-bold text-green-500 mb-2">(Completed)</p>
                            <p class="text-gray-600 text-sm">Core platform with all key business management modules.</p>
                        </div>
                    </div>
                    <div class="roadmap-phase">
                        <div class="roadmap-dot"></div>
                        <div class="roadmap-card">
                            <h3 class="text-xl font-bold text-[#4D648D]">Phase 2</h3>
                            <p class="text-gray-600 text-sm">Advanced financials, bank reconciliation, and HMRC/Companies House integration.</p>
                        </div>
                    </div>
                    <div class="roadmap-phase">
                        <div class="roadmap-dot"></div>
                        <div class="roadmap-card">
                            <h3 class="text-xl font-bold text-[#4D648D]">Phase 3</h3>
                            <p class="text-gray-600 text-sm">Launch of the professional services marketplace for new revenue streams.</p>
                        </div>
                    </div>
                    <div class="roadmap-phase">
                        <div class="roadmap-dot"></div>
                        <div class="roadmap-card">
                            <h3 class="text-xl font-bold text-[#4D648D]">Phase 4</h3>
                            <p class="text-gray-600 text-sm">Development of compliance certification generation tools.</p>
                        </div>
                    </div>
                    <div class="roadmap-phase">
                        <div class="roadmap-dot"></div>
                        <div class="roadmap-card">
                            <h3 class="text-xl font-bold text-[#4D648D]">Phase 5</h3>
                            <p class="text-gray-600 text-sm">AI implementation for automated and streamlined document creation.</p>
                        </div>
                    </div>
                    <div class="roadmap-phase">
                        <div class="roadmap-dot"></div>
                        <div class="roadmap-card">
                            <h3 class="text-xl font-bold text-[#4D648D]">Phase 6</h3>
                            <p class="text-gray-600 text-sm">Creation of tailored, industry-specific workspaces to cater to unique business needs.</p>
                        </div>
                    </div>
                </div>
                <div class="roadmap-line"></div>
            </div>
        </section>

        <section class="mb-20">
            <h2 class="text-3xl font-bold text-center mb-10 text-[#4D648D]">Phase 2: Making Tax Digital (MTD) and Compliance</h2>
            <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-xl p-8 text-center">
                <p class="text-lg leading-relaxed text-gray-700">
                    Making Tax Digital (MTD) is a key initiative by the UK government to modernize the tax system. By integrating directly with **HMRC and Companies House APIs**, dynamik.app will become MTD-certified, allowing businesses to seamlessly submit VAT returns, tax returns, and other official documents digitally. This not only ensures compliance and avoids penalties but also positions our app as an indispensable tool for financial management. Our ability to provide a consolidated platform for both day-to-day operations and mandatory financial reporting gives us a clear advantage over competitors who require third-party integrations for these services.
                </p>
            </div>
        </section>

        <section class="mb-20">
            <h2 class="text-3xl font-bold text-center mb-10 text-[#4D648D]">Phase 3: The Professional Marketplace</h2>
            <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-xl p-8 text-center">
                <p class="text-lg leading-relaxed text-gray-700">
                    The launch of our professional services marketplace is a key strategic move that provides a significant competitive advantage. By integrating a hub for designers, accountants, copywriters, and other experts, we create a powerful ecosystem that directly benefits our users. Professionals can sell their services to businesses directly on our platform, while dynamik.app earns a commission on each transaction. This not only generates a new, scalable revenue stream but also strengthens our platform's value proposition as the all-in-one solution for every business need.
                </p>
            </div>
        </section>

        <section class="mb-20">
            <h2 class="text-3xl font-bold text-center mb-10 text-[#4D648D]">Phase 4: The Compliance Advantage</h2>
            <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-xl p-8 text-center">
                <p class="text-lg leading-relaxed text-gray-700">
                    This phase is dedicated to building a core differentiating feature for our target market: **the ability to generate local authority compliance certificates directly within the app.** Our clients, particularly tradespeople, face a constant burden of creating and managing documents like Electrical Installation Condition Reports (EICRs) and Gas Safety Reports. By providing a streamlined, in-app solution, dynamik.app saves them immense time, reduces administrative overhead, and ensures their compliance is always up-to-date. This unique functionality transforms our app from a simple management tool into an essential business partner for their day-to-day operations.
                </p>
            </div>
        </section>

        <section class="mb-20">
            <h2 class="text-3xl font-bold text-center mb-10 text-[#4D648D]">Phase 5: Intelligent Document Automation</h2>
            <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-xl p-8 text-center">
                <p class="text-lg leading-relaxed text-gray-700">
                    Looking to the future, Phase 5 focuses on the implementation of **Artificial Intelligence (AI)** to enhance our document generation and compliance tools. AI will be used to automate data entry, pre-fill sections, and ensure accuracy in the creation of complex legal documents. This next-generation functionality will not only make the process faster and more efficient but will also significantly reduce human error. This technological leap will position dynamik.app as an innovator in the market, providing our users with a powerful, smart tool that gives them a clear competitive edge.
                </p>
            </div>
        </section>

        <section class="mb-20">
            <h2 class="text-3xl font-bold text-center mb-10 text-[#4D648D]">Phase 6: Tailored Workspaces for Every Trade</h2>
            <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-xl p-8 text-center">
                <p class="text-lg leading-relaxed text-gray-700">
                    The final phase of our roadmap is about creating a truly personalized user experience. We will develop **tailored workspaces** for different professions, from electricians to dentists. Each workspace will come with a pre-configured set of tools, assets, and workflows specific to that trade. For an electrician, this might include pre-loaded EICR templates and a specific inventory of cables and components. This level of customization makes the app feel purpose-built for each user's unique needs, deepening engagement and loyalty, and making it exceptionally difficult for a generalist competitor to match.
                </p>
            </div>
        </section>

        <section>
            <h2 class="text-3xl font-bold text-center mb-10 text-[#4D648D]">Funding Request: Use of Funds</h2>
            <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-xl p-8">
                <p class="text-center text-lg mb-8 text-gray-700">To achieve our projected market share and execute our roadmap, we are seeking **£250,000** in seed funding. This investment is structured to drive immediate growth and establish a foundation for long-term scalability. A breakdown of the allocation is below:</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                    <div class="bg-[#F0F4F8] rounded-lg p-6">
                        <h3 class="text-xl font-bold text-[#4D648D] mb-2">Marketing & Acquisition</h3>
                        <ul class="list-disc list-inside space-y-1 text-gray-600">
                            <li><strong>Digital Campaigns (Google Ads, TikTok):</strong> £30,000</li>
                            <li><strong>Physical Branding (Stickers, T-Shirts):</strong> £5,000</li>
                            <li>**Total: £35,000**</li>
                        </ul>
                        <p class="mt-4 text-sm text-gray-500">This budget will make an immediate impact, driving brand recognition and capturing a conservative 0.1% of our target market.</p>
                    </div>
                    <div class="bg-[#F0F4F8] rounded-lg p-6">
                        <h3 class="text-xl font-bold text-[#4D648D] mb-2">Product & Tech Development</h3>
                        <ul class="list-disc list-inside space-y-1 text-gray-600">
                            <li><strong>Mobile App Development (iOS & Android):</strong> £50,000</li>
                            <li>**Total: £50,000**</li>
                        </ul>
                        <p class="mt-4 text-sm text-gray-500">This investment will unlock critical on-site functionality for operatives, a key feature for our target audience of tradespeople and service providers.</p>
                    </div>
                    <div class="bg-[#F0F4F8] rounded-lg p-6">
                        <h3 class="text-xl font-bold text-[#4D648D] mb-2">Operations, Sales & Infrastructure</h3>
                        <ul class="list-disc list-inside space-y-1 text-gray-600">
                            <li><strong>Team Salaries (1 year):</strong> £100,000</li>
                            <li><strong>Office Space & Utilities:</strong> £20,000</li>
                            <li><strong>Operational Expenses:</strong> £15,000</li>
                            <li>**Total: £135,000**</li>
                        </ul>
                        <p class="mt-4 text-sm text-gray-500">This funding supports the existing core team and allows for strategic hires in sales and QA, while a physical office builds trust with our clientele.</p>
                    </div>
                </div>
                <div class="text-center mt-8">
                    <p class="text-2xl font-bold text-[#4D648D]">Total Funding Request: <span class="text-[#FF6B6B]">£250,000</span></p>
                    <p class="text-md text-gray-500 mt-2">Note: An additional contingency of £30,000 is included in the total request to ensure operational flexibility.</p>
                </div>
            </div>
        </section>
    </main>

    <footer class="text-center mt-20">
        <p class="text-gray-500">&copy; 2025 dynamik.app. All rights reserved.</p>
    </footer>
</div>

<script>
    const tooltipTitleCallback = (tooltipItems) => {
        const item = tooltipItems[0];
        let label = item.chart.data.labels[item.dataIndex];
        if (Array.isArray(label)) {
            return label.join(' ');
        } else {
            return label;
        }
    };

    const marketChartCtx = document.getElementById('marketChart').getContext('2d');
    new Chart(marketChartCtx, {
        type: 'doughnut',
        data: {
            labels: ['Self-Employed', ['Limited', 'Companies']],
            datasets: [{
                label: 'Market Segments',
                data: [4380000, 4870000],
                backgroundColor: ['#1E96FC', '#FF6B6B'],
                borderColor: '#FFFFFF',
                borderWidth: 5,
                hoverOffset: 10
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        font: {
                            size: 14
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        title: tooltipTitleCallback
                    }
                }
            },
            cutout: '60%'
        }
    });
</script>
</body>
</html>