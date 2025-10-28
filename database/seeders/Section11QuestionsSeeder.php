<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class Section11QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'section_id' => 11,
                'text' => 'You are on site and you need to dispose of some waste liquid which has oil in it and you are not sure what to do with it. What should you do?',
                'explanation' => 'Dealing with hazardous/special waste will include proper storage and segregation before it is taken away by an authorised waste carrier as required by environmental legislation. An oil spillage could also get into the ground or drains, which may also be an offence under environmental law. Burning waste on site is also an offence, under air pollution legislation, and can lead to local complaints.',
                'options' => [
                    ['text' => 'Dispose of it in a sealed container into the site skip', 'is_correct' => false],
                    ['text' => 'Pour it onto the ground, it will soak away', 'is_correct' => false],
                    ['text' => 'Take it outside and set light to it', 'is_correct' => false],
                    ['text' => 'Ask your supervisor about the correct way to deal with this waste.', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 11,
                'text' => 'How should you get rid of hazardous/special waste?',
                'explanation' => 'The Hazardous Waste Regulations (Special Waste Regulations in Scotland) require hazardous/special waste to be properly segregated or otherwise treated, and then recovered or disposed of in an officially approved way.',
                'options' => [
                    ['text' => 'Put it at the bottom of any site skip', 'is_correct' => false],
                    ['text' => 'In accordance with the correct site waste rules', 'is_correct' => true],
                    ['text' => 'Take it home, they wont want it on site', 'is_correct' => false],
                    ['text' => 'Take it to the nearest local authority waste tip', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 11,
                'text' => 'Which of the following is classed as hazardous/special waste?',
                'explanation' => 'Hazardous wastes (special wastes in Scotland) are specified in waste legislation. Fluorescent tubes are included because of their mercury content.',
                'options' => [
                    ['text' => 'Non-asbestos Insulation', 'is_correct' => false],
                    ['text' => 'Polythene and shrink wrap', 'is_correct' => false],
                    ['text' => 'Empty cement bags', 'is_correct' => false],
                    ['text' => 'Fluorescent light tubes', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 11,
                'text' => 'Which of the following should be disposed of as hazardous/special waste?',
                'explanation' => 'Hazardous wastes (special wastes in Scotland) are specified in waste legislation. Aerosol sealants are included because they can explode if not recovered or disposed of properly, and they may still contain hazardous solvents.',
                'options' => [
                    ['text' => 'Timber, plywood and MDF off-cuts', 'is_correct' => false],
                    ['text' => 'Glass fibre insulation', 'is_correct' => false],
                    ['text' => 'Aerosol sealant canisters', 'is_correct' => true],
                    ['text' => 'Used nuisance dust masks', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 11,
                'text' => 'You need to clean up some oil that has leaked from machinery onto the ground. What is the right way to do this?',
                'explanation' => 'Oil-contaminated wastes are classified as hazardous/ special waste in waste legislation. The Hazardous Waste Regulations (Special Waste Regulations in Scotland) require such waste to be properly segregated or otherwise treated, and then recovered or disposed of in an approved way. Following the other options would be an offence under waste legislation.',
                'options' => [
                    ['text' => 'Put the oily contaminated soil into the general waste skip', 'is_correct' => false],
                    ['text' => 'Put the oily contaminated soil into a suitable container that takes hazardous waste', 'is_correct' => true],
                    ['text' => 'Put it under some off-cuts so that the oil cannot be seen', 'is_correct' => false],
                    ['text' => 'Wash the oil away with water and detergent', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 11,
                'text' => 'Other site workers are complaining that you are generating too much dust. What should you do?',
                'explanation' => "Excessive dust may be a health hazard to you and those around you, but even if it is not a health hazard, excessive dust can be a 'statutory nuisance (under the Environmental Protection Act). Even when it is not a statutory nuisance, it can lead to complaints from neighbours and possible damage to neighbouring property.",
                'options' => [
                    ['text' => 'Tell them you have nearly finished', 'is_correct' => false],
                    ['text' => 'Stop work and inform your supervisor', 'is_correct' => true],
                    ['text' => "Ignore them-it's none of their business", 'is_correct' => false],
                    ['text' => 'Issue the other site workers with dust masks', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 11,
                'text' => 'Who needs to understand relevant environmental risks on a construction site?',
                'explanation' => 'The actions of everyone on site determine how well the risks to the environment (such as water pollution, or creating a local nuisance) are controlled.',
                'options' => [
                    ['text' => 'Only the principal contractor', 'is_correct' => false],
                    ['text' => 'Only the subcontractors', 'is_correct' => false],
                    ['text' => 'Everyone working on the site', 'is_correct' => true],
                    ['text' => 'Only the environmental clerk of works', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 11,
                'text' => 'Under environmental law, which statement is true?',
                'explanation' => 'Most environmental law is enforced against companies, but the regulator in the relevant part of the UK (the Environment Agency, SEPA or NIEA) can also prosecute company officers and even have powers to prosecute employees if they wilfully contribute to environmental harm.',
                'options' => [
                    ['text' => 'Companies and individuals can be prosecuted if they do not follow the law', 'is_correct' => true],
                    ['text' => 'Companies can be prosecuted, but not individuals', 'is_correct' => false],
                    ['text' => 'It is legal to transport business waste without proper paperwork', 'is_correct' => false],
                    ['text' => "It is legal to disturb protected species' habitats", 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 11,
                'text' => 'Do individuals have any responsibility for sustainability when on site?',
                'explanation' => 'Your responsibility is to follow the site and company rules aimed at environmental protection and sustainability, and to help your company to comply with relevant legal requirements, such as the need to segregate waste properly (e.g. so that it can be recovered).',
                'options' => [
                    ['text' => 'No, it is dealt with by the site manager', 'is_correct' => false],
                    ['text' => 'No, it is a matter for the Environment Agency/NIEA/SEPA', 'is_correct' => false],
                    ['text' => 'Only on sites where there is asbestos', 'is_correct' => false],
                    ['text' => 'Yes, on every site', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 11,
                'text' => 'Which of the following is NOT best practice from a sustainability point of view?',
                'explanation' => 'Option D would be wasting a valuable natural resource (copper) that could be effectively recovered for later use or recycling. Reusing or recycling copper has less environmental impact than mining and extracting new copper reserves.',
                'options' => [
                    ['text' => 'Saving materials, fuel, water and energy', 'is_correct' => false],
                    ['text' => 'Looking after the people working on or near the site', 'is_correct' => false],
                    ['text' => 'Protecting the environment', 'is_correct' => false],
                    ['text' => 'Sending unused and waste copper cables to landfill', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 11,
                'text' => 'Which of the following does NOT help sustainability during construction projects?',
                'explanation' => 'Option A generates local air pollution and carbon dioxide emissions (which contribute to global warming), and also increases the noise nuisance.',
                'options' => [
                    ['text' => 'Leaving engines and motors running when they are not needed', 'is_correct' => true],
                    ['text' => 'Segregating waste', 'is_correct' => false],
                    ['text' => 'Vehicle sharing or using public transport to get to work', 'is_correct' => false],
                    ['text' => 'Avoiding overheating site huts', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 11,
                'text' => 'Which of the following should you do on site in the interest of sustainability?',
                'explanation' => 'Your actions will help your company, and others working on site, to achieve more sustainable work practices, such as waste recovery.',
                'options' => [
                    ['text' => 'Run plant and equipment when they are not needed', 'is_correct' => false],
                    ['text' => 'Bury waste material', 'is_correct' => false],
                    ['text' => 'Comply with site instructions on handling waste materials', 'is_correct' => true],
                    ['text' => 'Pour waste liquids down a drain off-site', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 11,
                'text' => "Which of the following is NOT part of 'environmentally-friendly' construction?",
                'explanation' => 'Neighbours outside the site are an important part of the wider environment. They may be affected by nuisance (such as noise, dust or even light at night), and they may complain to the client, main contractor or the local enforcing authority. Creating certain types of nuisance is an offence under the Environmental Protection Act.',
                'options' => [
                    ['text' => 'Creating a dust nuisance to residents in neighbouring properties', 'is_correct' => true],
                    ['text' => 'Preventing water and soil pollution', 'is_correct' => false],
                    ['text' => 'Saving energy', 'is_correct' => false],
                    ['text' => 'Minimising the amount of waste you create during a job', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 11,
                'text' => 'From an environmental point of view, why should materials be reused, where possible?',
                'explanation' => 'Although reducing the amount of waste is the first priority, the re-use of materials can also contribute to effective waste management.',
                'options' => [
                    ['text' => 'To save the client money', 'is_correct' => false],
                    ['text' => 'A lot of energy and raw materials go into making most construction products', 'is_correct' => true],
                    ['text' => 'It makes less mess on site', 'is_correct' => false],
                    ['text' => "Its' a European Union Law", 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 11,
                'text' => 'Which action will help to minimise waste?',
                'explanation' => 'The hierarchy for managing waste is to reduce/reuse/ recover. Reducing the amount of waste is therefore the first priority.',
                'options' => [
                    ['text' => 'Only take or open what you need and return or reseal anything left over', 'is_correct' => true],
                    ['text' => 'Use new materials/packs at the beginning of each day', 'is_correct' => false],
                    ['text' => 'Leave materials unprotected in the rain', 'is_correct' => false],
                    ['text' => 'Always order much more than usually required - just in case you need it', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 11,
                'text' => 'Which of the following is good environmental practice?',
                'explanation' => 'This is good practice, since it will help with waste recovery. If the waste is classified as hazardous waste (special waste in Scotland) proper segregation is also a legal requirement.',
                'options' => [
                    ['text' => 'Over-ordering materials', 'is_correct' => false],
                    ['text' => 'Segregating waste into different types', 'is_correct' => true],
                    ['text' => 'Leaving skips uncovered in wet weather', 'is_correct' => false],
                    ['text' => 'Leaving motors running when they are not needed', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 11,
                'text' => 'Do individuals have any responsibility for minimising the amount of waste created on site?',
                'explanation' => 'Your actions will help your company, and others on site, to procure sensibly and to organise the job so that materials and substances are not wasted. Waste reduction is the best option when trying to manage site waste.',
                'options' => [
                    ['text' => 'Only if asbestos removal is being carried out', 'is_correct' => false],
                    ['text' => 'Yes, everyone on site has this responsibility', 'is_correct' => true],
                    ['text' => "No, it's the responsibility of the client", 'is_correct' => false],
                    ['text' => 'Only during site clean-up, at the end of the project', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 11,
                'text' => 'If you have unused material left, what should you do before you consider putting non-hazardous waste items into a skip?',
                'explanation' => 'Although reducing the amount of waste is the first priority, the reuse of waste materials is much better than disposal, which is the most expensive option and which should be the last resort. Reuse is a better waste management option than recovery.',
                'options' => [
                    ['text' => 'Make sure there is a label on it', 'is_correct' => false],
                    ['text' => 'Put it in a plastic bag and put it in a skip', 'is_correct' => false],
                    ['text' => 'Check whether someone else on your team can make use of it', 'is_correct' => true],
                    ['text' => 'Weigh it', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 11,
                'text' => 'Why should different types of waste be separated on site?',
                'explanation' => 'This is good practice, since waste recovery can save both energy and materials, compared to creating brand new materials or items. It will also cut the amount of waste that goes to landfill. If the waste is classed as hazardous (special waste in Scotland) then the effective separation of different wastes is a legal requirement.',
                'options' => [
                    ['text' => 'It will take up less room in the skip', 'is_correct' => false],
                    ['text' => 'So the local council can charge Landfill Tax', 'is_correct' => false],
                    ['text' => "So the main contractor can check what's being thrown away", 'is_correct' => false],
                    ['text' => 'So waste can be recovered more easily', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 11,
                'text' => 'When storing liquids (such as oils, fuels or chemicals) on-site, what must you do?',
                'explanation' => 'Any spillage could get into the ground or drains, which is likely to be an offence under environmental legislation.',
                'options' => [
                    ['text' => 'Always use the nearest container', 'is_correct' => false],
                    ['text' => 'Use a transparent container so you can check how much liquid is in it', 'is_correct' => false],
                    ['text' => 'Ensure the liquid material is stored safely and securely, and out of the way of site traffic', 'is_correct' => true],
                    ['text' => "Keep the tops off, to prevent pressure from building up", 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 11,
                'text' => 'What can help to prevent harm to the environment from oil spillages?',
                'explanation' => 'The use of a bund (fully walled storage area) or a drip tray will help any spillage to be contained in a small area for clear up. Any spillage could get into the ground or drains, which is likely to be an offence under environmental legislation.',
                'options' => [
                    ['text' => 'A supply of water to flush the spill away', 'is_correct' => false],
                    ['text' => 'Cover the spillage with soil', 'is_correct' => false],
                    ['text' => "Turning liquid containers upside down so the top can't come off", 'is_correct' => false],
                    ['text' => 'Store oils in an area that can catch any spills, such as a bund or a drip tray.', 'is_correct' => true],
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