<?php
/**
 * Template Name: FAQ Schema Generator
 * Description: Generate SEO-ready JSON-LD FAQ schema markup
 */

get_header();
?>

<style>
/* Base */
body {
    background: #0f172a;
}

/* Scope the box-sizing reset so we don't break the theme/footer */
.faq-tool-container *,
.faq-tool-container *::before,
.faq-tool-container *::after {
    box-sizing: border-box;
}

/* Main Container */
.faq-tool-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 0px;
    min-height: 100vh;
}

/* Header */
.tool-header {
    text-align: center;
    margin-bottom: 40px;
}

.tool-header h1 {
    font-size: 28px;
    color: #fff;
    margin-bottom: 10px;
    font-weight: 700;
}

.tool-subtitle {
    font-size: 14px;
    color: #94a3b8;
    line-height: 1.6;
}

/* Two Column Layout */
.tool-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
    align-items: flex-start;
}

/* Card Styling */
.tool-card {
    background: #1e293b;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
}
button#download-btn {
    display: none;
}
/* Format Tabs */
.format-tabs {
    display: flex;
    gap: 10px;
    margin-bottom: 30px;
    background: #0f172a;
    padding: 0px;
    border-radius: 10px;
}

.format-tab {
    flex: 1;
    padding: 12px 15px;
    background: transparent;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
    color: #94a3b8;
    transition: all 0.3s ease;
    font-weight: 600;
}

.format-tab:hover {
    color: #fff;
    background: #334155;
}

.format-tab.active {
    color: #fff;
    background: #2563eb;
}

/* Format Content */
.format-content {
    display: none;
}

.format-content.active {
    display: block;
}

/* Help Box */
.help-box {
    background: #0f172a;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    border-left: 4px solid #2563eb;
}

.help-box p {
    color: #94a3b8;
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 15px;
}

.help-box p:last-child {
    margin-bottom: 0;
}

.help-box strong {
    color: #fff;
}

.example-code {
    background: #1e293b;
    padding: 15px;
    border-radius: 6px;
    border: 1px solid #334155;
    font-size: 13px;
    color: #94a3b8;
    overflow-x: auto;
    font-family: monospace;
    line-height: 1.6;
    white-space: pre-wrap;
}

/* Form Elements */
.form-field {
    margin-bottom: 10px;
}

.form-label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #fff;
    font-size: 15px;
}

.form-input,
.form-textarea {
    width: 100%;
    padding: 12px 15px;
    border: 2px solid #334155;
    border-radius: 8px;
    font-size: 15px;
    font-family: inherit;
    transition: all 0.3s ease;
    background: #000;
    color: #fff;
}

.form-input::placeholder,
.form-textarea::placeholder {
    color: #64748b;
}

.form-input:focus,
.form-textarea:focus {
    outline: none;
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
}

#manual-format .form-textarea {
    resize: vertical;
    min-height: 70px;
    height: 70px;
}

.form-textarea {
    resize: vertical;
    min-height: 365px;
}

.char-count {
    text-align: right;
    font-size: 13px;
    color: #64748b;
    margin-top: 5px;
}

/* FAQ Items */
.faq-items {
    margin-bottom: 20px;
}

.faq-item {
    background: #0f172a;
    border: 2px solid #334155;
    border-radius: 10px;
    padding: 12px 14px;
    margin-bottom: 15px;
    transition: all 0.3s ease;
}

.faq-item:hover {
    border-color: #2563eb;
}

.faq-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.faq-number {
    color: #fff;
    font-size: 16px;
    font-weight: 600;
}

.btn-remove {
    background: #dc2626;
    color: white;
    border: none;
    padding: 6px 12px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 13px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-remove:hover {
    background: #b91c1c;
}

.faq-fields {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

/* Buttons */
.btn {
    width: 100%;
    padding: 14px 20px;
    border: none;
    border-radius: 8px;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.btn:hover {
    transform: translateY(-2px);
}

.btn-add {
    background: #10b981;
    color: white;
    margin-bottom: 20px;
}

.btn-add:hover {
    background: #059669;
}

.btn-primary {
    background: #2563eb;
    color: white;
}

.btn-primary:hover {
    background: #1d4ed8;
}

.btn-primary:disabled {
    background: #64748b;
    cursor: not-allowed;
    transform: none;
    opacity: 0.5;
}

.btn-secondary {
    background: #64748b;
    color: white;
}

.btn-secondary:hover {
    background: #475569;
}

.btn-secondary:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    transform: none;
}

.btn-danger {
    background: #dc2626;
    color: white;
}

.btn-danger:hover {
    background: #b91c1c;
}

.btn-danger:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    transform: none;
}

.btn-success {
    background: #10b981;
    color: white;
}

.btn-success:hover {
    background: #059669;
}

/* Output Section */
.output-header {
    margin-bottom: 20px;
}

.output-title {
    font-size: 20px;
    color: #fff;
    font-weight: 600;
    margin-bottom: 20px;
    font-family: 'Merriweather', serif;
}

.button-group {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 20px;
}

/* Code Editor */
.code-editor {
    background: #0a0f1e;
    border-radius: 8px;
    border: 2px solid #1e293b;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
}

.editor-header {
    background: #1e293b;
    padding: 12px 20px;
    border-bottom: 1px solid #334155;
    display: flex;
    align-items: center;
    gap: 8px;
}

.editor-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
}

.dot-red { background: #ef4444; }
.dot-yellow { background: #f59e0b; }
.dot-green { background: #10b981; }

.editor-title {
    color: #94a3b8;
    font-size: 13px;
    margin-left: 10px;
    font-weight: 500;
}

.editor-body {
    padding: 20px;
    max-height: 450px;
    overflow: auto;
    background: #0a0f1e;
}

.editor-body::-webkit-scrollbar {
    width: 10px;
    height: 10px;
}

.editor-body::-webkit-scrollbar-track {
    background: #0a0f1e;
}

.editor-body::-webkit-scrollbar-thumb {
    background: #334155;
    border-radius: 5px;
}

.editor-body pre {
    margin: 0;
    font-family: 'Consolas', 'Monaco', 'Courier New', monospace;
    background: transparent;
}

.editor-body code {
    color: #e2e8f0;
    font-size: 14px;
    line-height: 1.8;
    white-space: pre-wrap;
    word-break: break-word;
    display: block;
    background: transparent;
}

/* Messages */
.message {
    padding: 12px 20px;
    border-radius: 8px;
    margin-top: 15px;
    font-weight: 600;
    text-align: center;
    display: none;
    animation: slideIn 0.3s ease;
}

@keyframes slideIn {
    from { opacity: 0; transform: translateY(-10px); }
    to   { opacity: 1; transform: translateY(0); }
}

.message.show {
    display: block;
}

.message-success {
    background: #10b981;
    color: white;
}

.message-error {
    background: #dc2626;
    color: white;
}

.message-warning {
    background: #f59e0b;
    color: white;
}

/* Loading Indicator */
.loading {
    display: none;
    align-items: center;
    gap: 8px;
    color: #64748b;
    font-size: 14px;
    margin-top: 15px;
}

.loading.show {
    display: flex;
}

.loading-dot {
    width: 8px;
    height: 8px;
    background: #2563eb;
    border-radius: 50%;
    animation: bounce 1.4s infinite;
}

.loading-dot:nth-child(2) { animation-delay: 0.2s; }
.loading-dot:nth-child(3) { animation-delay: 0.4s; }

@keyframes bounce {
    0%, 60%, 100% { transform: translateY(0); opacity: 0.7; }
    30%          { transform: translateY(-10px); opacity: 1; }
}

/* Responsive Design */
@media (max-width: 1024px) {
    .tool-grid {
        grid-template-columns: 1fr;
    }

    .tool-header h1 {
        font-size: 26px;
    }

    .tool-subtitle {
        font-size: 14px;
    }

    .editor-body {
        max-height: 350px;
    }
}

@media (max-width: 768px) {
    .faq-tool-container {
        padding: 20px 15px;
    }

    .tool-card {
        padding: 20px;
    }

    .tool-header h1 {
        font-size: 22px;
    }

    .tool-subtitle {
        font-size: 13px;
    }

    .format-tabs {
        flex-direction: column;
        gap: 8px;
    }

    .format-tab {
        font-size: 13px;
    }

    .button-group {
        grid-template-columns: 1fr;
    }

    .form-textarea {
        min-height: 200px;
    }

    .editor-body {
        max-height: 300px;
        padding: 15px;
    }

    .editor-body code {
        font-size: 12px;
    }
}

@media (max-width: 480px) {
    .tool-header h1 {
        font-size: 18px;
    }

    .tool-subtitle {
        font-size: 12px;
    }

    .faq-item {
        padding: 15px;
    }
}
.b64-collapsible {
  max-height: 0;
  overflow: hidden;
  transition: max-height .45s ease;
}

.b64-collapsible.is-open {
  max-height: 6000px; /* adjust if your FAQ is very long */
}

.b64-readmore-btn {
  display: inline-block;
  margin: 20px auto;
  padding: 8px 18px;
  border: 0;
  border-radius: 8px;
  background: #2563eb;
  color: #fff;
  font-weight: 600;
  cursor: pointer;
  text-align: center;
}

/* center the button */
.b64-readmore-btn-wrapper {
  text-align: center;
}

.b64-readmore-btn:focus{outline:2px solid #93c5fd; outline-offset:2px;}

.b64-collapsible[hidden]{display:block; max-height:0; overflow:hidden;}
.b64-collapsible{
  transition:max-height .45s ease;
}
.b64-collapsible.is-open{
  max-height:6000px; /* large enough to reveal all */
}

/* Optional top fade when collapsed */
.b64-collapsible::before{
  content:"";
  display:block;
  height:0;
}
  .st64-wrapper {
    display: flex;
    justify-content: center;
    padding: 60px 20px;
}  
  section.b64-what-section {
    display: flex;
    justify-content: center;
    padding: 5px 20px 20px;
}
.b64-container {
    background: rgba(30, 41, 59, 0.6);
    backdrop-filter: blur(20px);
    border: 1px solid var(--border);
    padding: 50px 40px;
    border-radius: 24px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    width: 100%;
    max-width: 1200px;
    animation: fadeInUp 0.8s 
ease 0.6s both;
}
.b64-text {
    font-size: 16px;
    margin-bottom: 18px;
    color: #94a3b8;
    line-height: 1.8;
}
.b64-subheading {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 15px;
    color: #fff;
    margin-top: 0px;
    padding-top: 5px;
}
.b64-list {
    padding-left: 20px;
    margin-bottom: 20px;
}
.b64-list li {
    margin-bottom: 10px;
    font-size: 16px;
    line-height: 1.6;color: #94a3b8;
}
h3.b64-miniheading{color:#fff;}
.b64-list ol {
    margin-bottom: 10px;
    font-size: 16px;
    line-height: 1.6;
}
.b64-what-section table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 16px;
    border: 1px solid #e0e0e0;
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.05);
}
.b64-what-section thead {
    background-color: #f7f7f7;
}
.b64-what-section th, .b64-what-section td {
    text-align: center;
    padding: 12px 16px;
    border: 1px solid #e0e0e0;
}
img.entered.litespeed-loaded {
    padding-bottom: 15px;
}
ul.b64-list li a {
    color: #0b57d0;
    text-decoration: underline;
}
section.b64-what-section a {
    color: #0b57d0;
}
	@media (max-width:768px){.cta-button.pulse{padding:10px 30px;font-size:16px}ul.foot-nots li{padding-left:2px;display:inline-block;width:30%;font-size:13px}.single-post .entry-title{font-size:22px !important}.single-post h2{font-size:20px !important}.single-post h3{font-size:18px !important}.sft{float:left;width:100% !important}.foot-nots{float:left;width:100% !important}.bt-mob a{font-size:14px !important;line-height:20px}.why-sanish-grid{width:100%}.why-sanish-container{max-width:100% !important}ul.foot-nots{display:inline;list-style:none;float:left;width:100%;padding:10px 0 0 !important}.b64-subheading { font-size: 18px;}
	h1{font-size:20px;}
	h3.b64-miniheading {font-size: 16px;padding: 10px 0px;margin: 0px;}
	.st64-wrapper { padding: 20px 20px; max-width: 100%;}
		 .st64-card {
			padding: 25px 10px;
		}  
.ytpl-wrap { padding: 20px 16px;}	
.b64-container{padding: 15px;}	
.b64-text {
    font-size: 14px;
    margin-bottom: 18px;
    color: #94a3b8;
    line-height: 1.6;
}
.b64-list li {
    margin-bottom: 10px;
    font-size: 14px;
    line-height: 1.6;
    color: #94a3b8;
}
 }
</style>

<div class="faq-tool-container">
    <div class="tool-header">
        <h1>FAQ Schema Markup Generator</h1>
        <p class="tool-subtitle">
            Generate SEO-ready JSON-LD FAQ schema instantly as you type. Paste your FAQ content or build it manually, then copy or test the schema with Google.
        </p>
    </div>

    <div class="tool-grid">
        <!-- Left Column: Input Section -->
        <div class="tool-card">
            <div class="format-tabs">
                <button class="format-tab active" data-format="paragraph">📄 Auto Schema Generator</button>
                <button class="format-tab" data-format="manual">📝 Manual</button>
            </div>

            <!-- Paragraph Format -->
            <div class="format-content active" id="paragraph-format">
                <div class="help-box">
                    <p>Enter your FAQs—each question ending with “?” followed by its answer. The tool detects them automatically</p>
                    <!-- <p><strong>Example:</strong></p> -->
                  <!--   <div class="example-code">What is SEO?
SEO stands for Search Engine Optimization.

Why is SEO important?
SEO helps your website rank higher in search results.</div> -->
                </div>

                <div class="form-field">
                    <label class="form-label">Paste your full FAQ Content below</label>
                    <textarea id="paragraph-input" class="form-textarea" placeholder="What is your first question?
This is the answer to your first question.

What is your second question?
This is the answer to your second question."></textarea>
                    <div class="char-count"><span id="paragraph-count">0</span> characters</div>
                </div>

                <div class="loading" id="paragraph-loading">
                    <div class="loading-dot"></div>
                    <div class="loading-dot"></div>
                    <div class="loading-dot"></div>
                    <span>Generating schema...</span>
                </div>
            </div>

            <!-- Manual Format -->
            <div class="format-content" id="manual-format">
                <div class="help-box">
                    <p><strong>Manual Form:</strong> Add each question and answer pair one by one.</p>
                </div>

                <div class="faq-items" id="faq-items">
                    <div class="faq-item" data-index="1">
                        <div class="faq-header">
                            <div class="faq-number">Question 1</div>
                            <button type="button" class="btn-remove" onclick="removeFaqItem(this)">✕</button>
                        </div>
                        <div class="faq-fields">
                            <div class="form-field">
                                <label class="form-label">Question</label>
                                <input type="text" class="form-input question-input" placeholder="Enter your question">
                            </div>
                            <div class="form-field">
                                <label class="form-label">Answer</label>
                                <textarea class="form-textarea answer-input" rows="3" placeholder="Enter your answer"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-add" onclick="addFaqItem()">+ Add Question</button>

                <div class="loading" id="manual-loading">
                    <div class="loading-dot"></div>
                    <div class="loading-dot"></div>
                    <div class="loading-dot"></div>
                    <span>Generating schema...</span>
                </div>

                <div class="message message-warning" id="manual-warning"></div>
            </div>
        </div>

        <!-- Right Column: Output Section -->
        <div class="tool-card">
            <div class="output-header">
                <div class="output-title">Generated Schema Code</div>

                <div class="button-group">
                    <button type="button" class="btn btn-primary" id="copy-btn" disabled onclick="copySchema()">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M19,21H8V7H19M19,5H8A2,2 0 0,0 6,7V21A2,2 0 0,0 8,23H19A2,2 0 0,0 21,21V7A2,2 0 0,0 19,5M16,1H4A2,2 0 0,0 2,3V17H4V3H16V1Z" />
                        </svg>
                        Copy Code
                    </button>

                    <button type="button" class="btn btn-secondary" id="download-btn" disabled onclick="downloadJson()">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M5,20H19V18H5M19,9H15V3H9V9H5L12,16L19,9Z" />
                        </svg>
                        Download JSON
                    </button>

                    <button type="button" class="btn btn-danger" id="clear-btn" disabled onclick="clearAll()">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                        </svg>
                        Clear All
                    </button>

                    <button type="button" class="btn btn-success" id="test-btn" style="display:none;" onclick="openRichResults()">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                        </svg>
                        Test with Google
                    </button>
                </div>

                <div class="message message-success" id="success-msg"></div>
                <div class="message message-error" id="error-msg"></div>

                <!-- Hidden form used to POST schema to Google's Rich Results Test -->
                <form id="google-test-form"
                      method="post"
                      action="https://search.google.com/test/rich-results"
                      target="_blank"
                      style="display:none;">
                    <textarea name="code_snippet" id="google-code-snippet"></textarea>
                </form>
            </div>

            <div class="code-editor">
                <div class="editor-header">
                    <div class="editor-dot dot-red"></div>
                    <div class="editor-dot dot-yellow"></div>
                    <div class="editor-dot dot-green"></div>
                    <span class="editor-title">faq-schema.json</span>
                </div>
                <div class="editor-body">
                    <pre><code id="schema-output"></code></pre>
                </div>
            </div>
        </div>
    </div> 
</div>
  
<script>
(function () {
    'use strict';

    // Global state
    let currentFormat   = 'paragraph';
    let generatedSchema = null;
    let debounceTimer   = null;
    let faqCounter      = 1;

    // Elements
    const formatTabs     = document.querySelectorAll('.format-tab');
    const paragraphInput = document.getElementById('paragraph-input');
    const faqItems       = document.getElementById('faq-items');
    const schemaOutput   = document.getElementById('schema-output');
    const copyBtn        = document.getElementById('copy-btn');
    const downloadBtn    = document.getElementById('download-btn');
    const clearBtn       = document.getElementById('clear-btn');
    const testBtn        = document.getElementById('test-btn');
    const successMsg     = document.getElementById('success-msg');
    const errorMsg       = document.getElementById('error-msg');

    function init() {
        setDefaultSchema();
        setupEventListeners();
        updateCharCounts();
    }

    // Default placeholder schema
    function setDefaultSchema() {
        const schema = {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                {
                    "@type": "Question",
                    "name": "",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": ""
                    }
                }
            ]
        };
        const json = JSON.stringify(schema, null, 2);
        const html =
            '<script type="application/ld+json">\n' +
            json +
            '\n<\/script>';
        schemaOutput.textContent = html;
    }

    function setupEventListeners() {
        formatTabs.forEach(tab => {
            tab.addEventListener('click', () => switchFormat(tab.dataset.format));
        });

        if (paragraphInput) {
            paragraphInput.addEventListener('input', () => {
                updateCharCounts();
                handleAutoGenerate();
            });
        }

        if (faqItems) {
            faqItems.addEventListener('input', (e) => {
                if (e.target.matches('.question-input, .answer-input')) {
                    handleAutoGenerate();
                }
            });
        }
    }

    function switchFormat(format) {
        currentFormat = format;

        formatTabs.forEach(tab => {
            tab.classList.toggle('active', tab.dataset.format === format);
        });

        document.querySelectorAll('.format-content').forEach(content => {
            content.classList.remove('active');
        });
        const active = document.getElementById(format + '-format');
        if (active) active.classList.add('active');

        handleAutoGenerate();
    }

    function updateCharCounts() {
        const paragraphCount = document.getElementById('paragraph-count');
        if (paragraphInput && paragraphCount) {
            paragraphCount.textContent = paragraphInput.value.length;
        }
    }

    function handleAutoGenerate() {
        clearTimeout(debounceTimer);
        showLoading();

        debounceTimer = setTimeout(() => {
            generateSchema();
            hideLoading();
        }, 500);
    }

    function showLoading() {
        const loading = document.getElementById(currentFormat + '-loading');
        if (loading) loading.classList.add('show');
    }

    function hideLoading() {
        document.querySelectorAll('.loading').forEach(el => el.classList.remove('show'));
    }

    function generateSchema() {
        let faqs = [];

        if (currentFormat === 'paragraph') {
            faqs = parseParagraphFormat();
        } else if (currentFormat === 'manual') {
            faqs = parseManualFormat();
        }

        const validFaqs = faqs.filter(f => f.question.trim() && f.answer.trim());

        if (validFaqs.length === 0) {
            setDefaultSchema();
            disableButtons();
            generatedSchema = null;
            return;
        }

        const schema = {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": validFaqs.map(faq => ({
                "@type": "Question",
                "name": faq.question,
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": faq.answer
                }
            }))
        };

        const json = JSON.stringify(schema, null, 2);
        const html =
            '<script type="application/ld+json">\n' +
            json +
            '\n<\/script><!-- Generated by Sanish Software Solutions FAQ Schema Generator -->';

        generatedSchema = { html, json, object: schema };
        schemaOutput.textContent = html;
        enableButtons();
    }

    function parseParagraphFormat() {
        const text = paragraphInput.value.trim();
        if (!text) return [];

        const faqs  = [];
        const lines = text.split('\n').map(l => l.trim()).filter(l => l);
        let currentQ = null;
        let currentA = [];

        lines.forEach(line => {
            if (line.endsWith('?')) {
                if (currentQ && currentA.length > 0) {
                    faqs.push({ question: currentQ, answer: currentA.join(' ') });
                }
                currentQ = line;
                currentA = [];
            } else if (currentQ) {
                currentA.push(line);
            }
        });

        if (currentQ && currentA.length > 0) {
            faqs.push({ question: currentQ, answer: currentA.join(' ') });
        }

        return faqs;
    }

    function parseManualFormat() {
        const faqs  = [];
        const items = faqItems.querySelectorAll('.faq-item');

        items.forEach(item => {
            const question = item.querySelector('.question-input').value.trim();
            const answer   = item.querySelector('.answer-input').value.trim();
            if (question || answer) {
                faqs.push({ question, answer });
            }
        });

        return faqs;
    }

    function enableButtons() {
        copyBtn.disabled      = false;
        downloadBtn.disabled  = false;
        clearBtn.disabled     = false;
        testBtn.style.display = 'flex';
    }

    function disableButtons() {
        copyBtn.disabled      = true;
        downloadBtn.disabled  = true;
        clearBtn.disabled     = true;
        testBtn.style.display = 'none';
    }

    // Copy schema (script-wrapped)
    window.copySchema = function () {
        if (!generatedSchema) return;

        const text = generatedSchema.html;

        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(text)
                .then(() => showMessage('success', '✓ Schema code copied to clipboard'))
                .catch(() => fallbackCopy(text));
        } else {
            fallbackCopy(text);
        }
    };

    function fallbackCopy(text) {
        const textarea = document.createElement('textarea');
        textarea.value = text;
        textarea.style.position = 'fixed';
        textarea.style.opacity  = '0';
        document.body.appendChild(textarea);
        textarea.focus();
        textarea.select();

        try {
            document.execCommand('copy');
            showMessage('success', '✓ Schema code copied to clipboard');
        } catch (err) {
            showMessage('error', 'Failed to copy schema');
        }

        document.body.removeChild(textarea);
    }

    // Download pure JSON
    window.downloadJson = function () {
        if (!generatedSchema) return;

        const blob = new Blob([generatedSchema.json], { type: 'application/json' });
        const url  = URL.createObjectURL(blob);
        const a    = document.createElement('a');
        a.href     = url;
        a.download = 'faq-schema.json';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);

        showMessage('success', '✓ JSON file downloaded');
    };

    window.clearAll = function () {
        if (currentFormat === 'paragraph') {
            paragraphInput.value = '';
        } else if (currentFormat === 'manual') {
            faqItems.innerHTML = '' +
                '<div class="faq-item" data-index="1">' +
                    '<div class="faq-header">' +
                        '<div class="faq-number">Question 1</div>' +
                        '<button type="button" class="btn-remove" onclick="removeFaqItem(this)">✕</button>' +
                    '</div>' +
                    '<div class="faq-fields">' +
                        '<div class="form-field">' +
                            '<label class="form-label">Question</label>' +
                            '<input type="text" class="form-input question-input" placeholder="Enter your question">' +
                        '</div>' +
                        '<div class="form-field">' +
                            '<label class="form-label">Answer</label>' +
                            '<textarea class="form-textarea answer-input" rows="3" placeholder="Enter your answer"></textarea>' +
                        '</div>' +
                    '</div>' +
                '</div>';
            faqCounter = 1;
        }

        setDefaultSchema();
        disableButtons();
        generatedSchema = null;
        updateCharCounts();
        showMessage('success', '✓ Content cleared');
    };

    window.addFaqItem = function () {
        faqCounter++;
        const div = document.createElement('div');
        div.className     = 'faq-item';
        div.dataset.index = faqCounter;
        div.innerHTML =
            '<div class="faq-header">' +
                '<div class="faq-number">Question ' + faqCounter + '</div>' +
                '<button type="button" class="btn-remove" onclick="removeFaqItem(this)">✕</button>' +
            '</div>' +
            '<div class="faq-fields">' +
                '<div class="form-field">' +
                    '<label class="form-label">Question</label>' +
                    '<input type="text" class="form-input question-input" placeholder="Enter your question">' +
                '</div>' +
                '<div class="form-field">' +
                    '<label class="form-label">Answer</label>' +
                    '<textarea class="form-textarea answer-input" rows="3" placeholder="Enter your answer"></textarea>' +
                '</div>' +
            '</div>';
        faqItems.appendChild(div);
        const input = div.querySelector('.question-input');
        if (input) input.focus();
    };

    window.removeFaqItem = function (btn) {
        const items = faqItems.querySelectorAll('.faq-item');
        if (items.length > 1) {
            btn.closest('.faq-item').remove();
            renumberItems();
            handleAutoGenerate();
        } else {
            showMessage('warning', 'At least one question is required');
        }
    };

    function renumberItems() {
        const items = faqItems.querySelectorAll('.faq-item');
        items.forEach((item, index) => {
            item.dataset.index = index + 1;
            const num = item.querySelector('.faq-number');
            if (num) num.textContent = 'Question ' + (index + 1);
        });
        faqCounter = items.length;
    }

    function showMessage(type, text) {
        hideMessages();

        let msg;
        if (type === 'success') msg = successMsg;
        else if (type === 'error') msg = errorMsg;
        else if (type === 'warning') msg = document.getElementById('manual-warning');

        if (msg) {
            msg.textContent = text;
            msg.classList.add('show');
            setTimeout(function () {
                msg.classList.remove('show');
            }, 3000);
        }
    }

    function hideMessages() {
        document.querySelectorAll('.message').forEach(function (el) {
            el.classList.remove('show');
        });
    }

    // Test with Google: POST schema to search.google.com so Code tab is prefilled
    window.openRichResults = function () {
        const form     = document.getElementById('google-test-form');
        const textarea = document.getElementById('google-code-snippet');

        if (!generatedSchema) {
            showMessage('warning', 'Generate schema before testing with Google');
            return;
        }

        if (form && textarea) {
            textarea.value = generatedSchema.html || '';
            form.submit();
            showMessage('success', 'Opening Google Rich Results Test with your schema code');
        } else {
            window.open('https://search.google.com/test/rich-results', '_blank', 'noopener');
        }
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
</script>
<script>
(function(){
  const btn = document.getElementById('b64-toggle');
  const box = document.getElementById('b64-collapsible');
  if(!btn || !box) return;

  // Start collapsed
  let open = false;

  btn.addEventListener('click', function(){
    open = !open;
    btn.setAttribute('aria-expanded', String(open));
    btn.textContent = open ? 'Show less' : 'Read more';
    box.classList.toggle('is-open', open);

    if(open){
      box.scrollIntoView({behavior:'smooth', block:'start'});
    }
  });
})();
</script>
<?php
get_footer();
?>
