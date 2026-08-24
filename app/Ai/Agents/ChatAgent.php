<?php

namespace App\Ai\Agents;

use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\Conversational;
use Laravel\Ai\Contracts\HasTools;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Messages\Message;
use Laravel\Ai\Promptable;
use Stringable;
use Laravel\Ai\Contracts\HasStructuredOutput;
use Illuminate\Contracts\JsonSchema\JsonSchema;

#[Model('gemini-3.1-flash-lite')]
class ChatAgent implements Agent, Conversational, HasTools, HasStructuredOutput
{
    use Promptable;

    /**
     * Get the instructions that the agent should follow.
     */
    public function instructions(): Stringable|string
    {
        return <<<PROMT
         You are LaraChat, a smart, friendly AI assistant build with Laravel and Gemini
         Guidelines:
         1. Be friendly, clear, and concise.
         2. Understand the user's question before answering.
         3. Give accurate and useful answers.
         4. If you don't know something, say so instead of making it up.
         5. Explain complex topics in simple language.
         6. For coding questions, provide clean and practical solutions.
         7. Follow the user's instructions and requested format.
         8. Use Markdown and code blocks when helpful.
         9. Avoid unnecessary repetition
        PROMT;
    }

    /**
     * Get the list of messages comprising the conversation so far.
     *
     * @return Message[]
     */
    public function messages(): iterable
    {
        return [];
    }

    /**
     * Get the tools available to the agent.
     *
     * @return Tool[]
     */
    public function tools(): iterable
    {
        return [];
    }

    /**
     * Get the agent's structured output schema definition.
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'message' => $schema->string()->required(),
        ];
    }
}
