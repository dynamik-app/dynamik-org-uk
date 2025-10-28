<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class Section2QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'section_id' => 2,
                'text' => 'If there is a risk of injury from lifting loads what should you think about first?',
                'explanation' => 'If possible, it is best to avoid the risks from lifting altogether. This is the preferred requirement laid down in the Manual Handling Operations Regulations 1992.',
                'options' => [
                    ['text' => 'Whether the load needs to be lifted at all', 'is_correct' => true],
                    ['text' => 'What the weight of the load is', 'is_correct' => false],
                    ['text' => 'Where to hold the load when lifting', 'is_correct' => false],
                    ['text' => 'How to lift the load', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 2,
                'text' => 'Before performing manual lifting what is the first thing you should do?',
                'explanation' => 'If you assess the whole task first, you will have a clear idea of possible hazards and how to overcome them, before lifting.',
                'options' => [
                    ['text' => 'Check the headroom', 'is_correct' => false],
                    ['text' => 'Weigh the article', 'is_correct' => false],
                    ['text' => 'Assess the whole task', 'is_correct' => true],
                    ['text' => 'Kick it to see if it is stable', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 2,
                'text' => 'Which is the part of your body MOST LIKELY to be injured during a manual handling activity which involves moving a heavy load?',
                'explanation' => 'HSE statistics show that most manual handling injuries are to the back.',
                'options' => [
                    ['text' => 'Knees', 'is_correct' => false],
                    ['text' => 'Forearms', 'is_correct' => false],
                    ['text' => 'Chest', 'is_correct' => false],
                    ['text' => 'Back', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 2,
                'text' => 'What should you do if your supervisor asks you to move something that you find is too heavy to lift?',
                'explanation' => 'The HSE advises employees to inform the employer if they identify hazardous handling activities.',
                'options' => [
                    ['text' => 'Give it a try using correct lifting methods', 'is_correct' => false],
                    ['text' => 'Ask your mates to assist in the lift', 'is_correct' => false],
                    ['text' => 'Inform your supervisor that it is too heavy', 'is_correct' => true],
                    ['text' => 'Get a forklift truck or lifting tackle', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 2,
                'text' => 'What would you NOT consider in making a judgement of the risks from a load?',
                'explanation' => 'A, C and D can all affect the difficulty of lifting an object.',
                'options' => [
                    ['text' => 'Its size and condition', 'is_correct' => false],
                    ['text' => 'Its colour', 'is_correct' => true],
                    ['text' => 'Its weight', 'is_correct' => false],
                    ['text' => 'Its centre of gravity', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 2,
                'text' => 'When moving a load fitted with wheels which of the following is generally true?',
                'explanation' => 'The operator should try to push rather than pull when moving a load, provided they can see over it and control steering and stopping.',
                'options' => [
                    ['text' => 'Pushing and pulling are equally risky', 'is_correct' => false],
                    ['text' => 'Pulling is preferable to pushing', 'is_correct' => false],
                    ['text' => 'Pushing is preferable to pulling', 'is_correct' => true],
                    ['text' => 'It is safer to pick it up and carry it', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 2,
                'text' => 'A manual handling operation is defined as which one of the following?',
                'explanation' => 'Manual handling covers human effort only.',
                'options' => [
                    ['text' => 'Automated effort', 'is_correct' => false],
                    ['text' => 'Human effort', 'is_correct' => true],
                    ['text' => 'Mechanised and human effort', 'is_correct' => false],
                    ['text' => 'Mechanised effort', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 2,
                'text' => 'What is the MAXIMUM weight that an individual may lift?',
                'explanation' => 'There are no strict weight limits - the priority is to avoid injury.',
                'options' => [
                    ['text' => 'The weight they can lift comfortably', 'is_correct' => true],
                    ['text' => 'Whatever the supervisor instructs', 'is_correct' => false],
                    ['text' => '35kg provided that it has no sharp edges', 'is_correct' => false],
                    ['text' => '15kg provided that it is a compact load', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 2,
                'text' => 'What is the most common type of injury resulting from lifting loads from the floor?',
                'explanation' => 'As shown by HSE statistics.',
                'options' => [
                    ['text' => 'Vibration white finger', 'is_correct' => false],
                    ['text' => 'Grazes to the knees', 'is_correct' => false],
                    ['text' => 'Head injuries', 'is_correct' => false],
                    ['text' => 'Back injuries', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 2,
                'text' => 'Where a load has to be lifted manually, what is the employer required to do by law?',
                'explanation' => 'This is a specific requirement of the Manual Handling Operations regulations 1992.',
                'options' => [
                    ['text' => 'Calculate the cost of the exercise', 'is_correct' => false],
                    ['text' => 'Determine the number of people required', 'is_correct' => false],
                    ['text' => 'Assess the risk of the task', 'is_correct' => true],
                    ['text' => 'Assess the time the job will take', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 2,
                'text' => 'Which of the following is advisable when lifting a load manually?',
                'explanation' => 'Stooping can increase the stress on the lower back. However, stooping slightly may be preferable to adopting a squatting posture, which can place excessive loads on knees and hips.',
                'options' => [
                    ['text' => 'Keep legs straight, bend back, use power of legs', 'is_correct' => false],
                    ['text' => 'Bend the knees, keep the back straight, use power of back', 'is_correct' => false],
                    ['text' => 'Bend the knees, keep the back as straight as possible, use power of legs', 'is_correct' => true],
                    ['text' => 'Keep legs and back straight, use power of legs', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 2,
                'text' => 'In manual handling, which of the following general statements is true?',
                'explanation' => 'This is a recommendation (INDG143).',
                'options' => [
                    ['text' => 'You should keep your back bent when lifting', 'is_correct' => false],
                    ['text' => 'Anyone can carry any load as long as they are strong enough', 'is_correct' => false],
                    ['text' => 'Large loads should be broken down into smaller loads where possible', 'is_correct' => true],
                    ['text' => "Loads should be held at arm's length while carrying", 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 2,
                'text' => 'What is the recommended limit for a compact load, that can be safely carried by a fit, male worker?',
                'explanation' => 'This figure is in HSE guidance, and relates to lifting and lowering at elbow height.',
                'options' => [
                    ['text' => '50kg', 'is_correct' => false],
                    ['text' => '40kg', 'is_correct' => false],
                    ['text' => '20kg', 'is_correct' => false],
                    ['text' => '25kg', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 2,
                'text' => 'Where there has been a major change in a manual handling operation, what should the employer do?',
                'explanation' => 'This is a specific requirement of the Manual Handling Operations regulations 1992.',
                'options' => [
                    ['text' => 'Monitor the operation being undertaken', 'is_correct' => false],
                    ['text' => 'Review the number of people involved', 'is_correct' => false],
                    ['text' => 'Review the original risk assessment', 'is_correct' => true],
                    ['text' => 'Monitor the cost of change', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 2,
                'text' => 'What should be the first consideration when you are about to lift a load on your own?',
                'explanation' => 'Employees should assess whether there is a risk of injury before lifting. If they are not sure they should seek advice from their supervisor.',
                'options' => [
                    ['text' => 'Assess whether it is safe to lift it on your own', 'is_correct' => true],
                    ['text' => 'Ensure you wear appropriate PPE', 'is_correct' => false],
                    ['text' => 'Wear gloves and grip properly', 'is_correct' => false],
                    ['text' => 'Ensure you lift with a bent back', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 2,
                'text' => 'Which of the following would NOT make a load easier to handle manually?',
                'explanation' => null,
                'options' => [
                    ['text' => 'Painting it a bright colour', 'is_correct' => true],
                    ['text' => 'Securing the load so that it does not shift unexpectedly', 'is_correct' => false],
                    ['text' => 'Reducing its weight', 'is_correct' => false],
                    ['text' => 'Providing suitable handles or hand grips', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 2,
                'text' => 'If there is a risk of injury from moving loads what should you think about?',
                'explanation' => 'This is a requirement of the Manual Handling Operations regulations 1992.',
                'options' => [
                    ['text' => 'Advising your supervisor', 'is_correct' => true],
                    ['text' => 'Carrying it anyway', 'is_correct' => false],
                    ['text' => 'Dragging it all the way', 'is_correct' => false],
                    ['text' => 'Getting someone to assist you over the distance', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 2,
                'text' => 'As an approximate guide the manual handling capacity of a two person team is:',
                'explanation' => 'This is contained in HSE guidance on the Manual Handling Operations Regulations 1992.',
                'options' => [
                    ['text' => 'The sum of their individual capacities', 'is_correct' => false],
                    ['text' => 'The capacity of the strongest individual', 'is_correct' => false],
                    ['text' => 'The capacity of the weakest individual', 'is_correct' => false],
                    ['text' => 'Two thirds the sum of their individual capacities', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 2,
                'text' => "What does 'Kinetic lifting' mean?",
                'explanation' => null,
                'options' => [
                    ['text' => 'Using a crane or some other mechanical means', 'is_correct' => false],
                    ['text' => 'Using a forklift truck or pallet truck', 'is_correct' => false],
                    ['text' => 'Lifting in the most safe and effective way', 'is_correct' => true],
                    ['text' => 'Getting a friend to help you with the load', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 2,
                'text' => 'What should you do first before lifting or moving a load?',
                'explanation' => 'You or your employer must assess the risk of injury before lifting.',
                'options' => [
                    ['text' => 'Put on gloves', 'is_correct' => false],
                    ['text' => 'Assess the weight', 'is_correct' => true],
                    ['text' => 'Keep a straight back', 'is_correct' => false],
                    ['text' => 'Bend your knees', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 2,
                'text' => 'Before picking up a load, you should:',
                'explanation' => 'You or your employer must assess the risk of injury before lifting.',
                'options' => [
                    ['text' => 'Bend your knees', 'is_correct' => false],
                    ['text' => 'Choose a pair of gloves', 'is_correct' => false],
                    ['text' => 'Ask a work mate to help you', 'is_correct' => false],
                    ['text' => 'Assess the risks', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 2,
                'text' => 'When picking up an object, you should:',
                'explanation' => 'Generally, the legs should do most of the work when lifting a load.',
                'options' => [
                    ['text' => 'Bend your arms', 'is_correct' => false],
                    ['text' => 'Bend your back', 'is_correct' => false],
                    ['text' => 'Wear a back brace', 'is_correct' => false],
                    ['text' => 'Bend your knees', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 2,
                'text' => "When judging 'individual capability' for manual handling, you should assume:",
                'explanation' => 'Assessing ability for manual handling must be done on an individual basis.',
                'options' => [
                    ['text' => 'All women are equally capable', 'is_correct' => false],
                    ['text' => 'Young men are weak', 'is_correct' => false],
                    ['text' => 'All people are different', 'is_correct' => true],
                    ['text' => 'All men are equally capable', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 2,
                'text' => 'When an article has to be moved for a long distance, you should:',
                'explanation' => 'The use of handling aids can reduce the risk of injury.',
                'options' => [
                    ['text' => 'Use a barrow or trolley', 'is_correct' => true],
                    ['text' => 'Get someone else to do it for you', 'is_correct' => false],
                    ['text' => 'Drag it all the way', 'is_correct' => false],
                    ['text' => 'Carry it all the way', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 2,
                'text' => 'Which is the correct way to lift a load?',
                'explanation' => 'Handling techniques which allow the use of relatively strong leg muscles rather than those of the back are preferable.',
                'options' => [
                    ['text' => 'Squat near load, bend back and use leg muscles', 'is_correct' => false],
                    ['text' => 'Squat near to the load, keeping the back as straight as possible and using leg muscles', 'is_correct' => true],
                    ['text' => 'Keep feet apart and bend back', 'is_correct' => false],
                    ['text' => 'Keep feet together and bend back', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 2,
                'text' => 'Which would you consider to be generally correct when lifting a load?',
                'explanation' => 'This is a recommendation in HSE guidance (INDG143).',
                'options' => [
                    ['text' => 'Larger loads should be split into smaller loads if possible', 'is_correct' => true],
                    ['text' => 'Keep the load away from the body', 'is_correct' => false],
                    ['text' => 'When lifting you should bend your back', 'is_correct' => false],
                    ['text' => "The feet should be together and the load lifted at arm's length", 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 2,
                'text' => 'If a load has an uneven centre of gravity, how should you lift it?',
                'explanation' => "There is less risk of injury if a weight's centre of gravity is near the torso.",
                'options' => [
                    ['text' => 'Keep the heaviest side of the load away from you', 'is_correct' => false],
                    ['text' => 'Keep the heaviest side of the load on the strongest arm', 'is_correct' => false],
                    ['text' => 'Keep the heaviest side of the load towards you', 'is_correct' => true],
                    ['text' => 'Keep the heaviest side of the load on the weakest arm', 'is_correct' => false],
                ],
            ],
        ];

        foreach ($questions as $questionData) {
            $question = Question::create([
                'section_id' => $questionData['section_id'],
                'text' => $questionData['text'],
                'explanation' => $questionData['explanation'],
            ]);

            foreach ($questionData['options'] as $optionData) {
                $question->options()->create($optionData);
            }
        }
    }
}